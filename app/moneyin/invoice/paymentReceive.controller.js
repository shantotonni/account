var invoice = angular.module('app', []);
invoice.controller('PaymentReceiveController', PaymentReceiveController);

function PaymentReceiveController($scope, $http) {


    $( document.body ).click(function() {
        $scope.calculateExcessPayment();
    });

    $scope.invoice_amount = [];
    $scope.invoice_amount_temp = [];
    $scope.payment_receive_adjustment = [];
    $scope.currentPage = 0;

    $http
        .get(window.location.origin + "/api/payment-receive/get-customer-list", {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){

            customer = response.data.customer;
            paid_receives = response.data.paid_receives;

            $('#customer_id').kendoDropDownList({
                optionLabel   : "Select Customer",
                dataTextField: "text",
                dataValueField: "value",
                dataSource: customer,
                dataType: "jsonp",
                filter: "contains",
                index: 0
            });

            $('#account_id').kendoDropDownList({
                dataTextField: "text",
                dataValueField: "value",
                dataSource: paid_receives,
                dataType: "jsonp",
                filter: "contains",
                index: 0
            });

        });

    $scope.getAccountType = function () {
        $scope.account_type = $("#account_id").data("kendoDropDownList").value();
        $("#show").show();
        $("#show2").show();
    }

    $scope.truefalse = true;
    $scope.getCustomerInvoice = function () {
        var customer_id = $("#customer_id").data("kendoDropDownList").value();
        console.log(customer_id);

        $("#show").hide();
        $("#show2").hide();

        $http
            .get(window.location.origin + "/api/payment-receive/get-customer-invoice/" + customer_id, {
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined, 'Process-Data': false}
            })
            .then(function(response){
                $scope.invoices = response.data.invoices;
                console.log($scope.invoices);
            });
        if(customer_id)
        {
            $scope.currentPage = 1;
            $scope.truefalse = false;
        }
        else
        {
            $scope.currentPage = 0;
            $scope.truefalse = true;
        }

    }

    $scope.amountReceived = function () {
        $scope.amount_received = parseFloat($scope.amount);
        var received_amount = parseFloat($scope.amount_received);
        for(var i = 0; i < $scope.invoices.length; i++)
        {
            if(received_amount > $scope.invoices[i].due_amount)
            {
                $scope.invoice_amount[i] = parseFloat($scope.invoices[i].due_amount);
                $scope.invoice_amount_temp[i] = parseFloat($scope.invoices[i].due_amount);
                received_amount = parseFloat(received_amount - $scope.invoices[i].due_amount);
            }
            else
            {
                $scope.invoice_amount[i] = parseFloat(received_amount);
                $scope.invoice_amount_temp[i] = parseFloat(received_amount);
                received_amount = 0;
            }
            $scope.calculateExcessPayment(i);
        }
    }


    $scope.calculateExcessPayment = function (index) {
        var total_balance = 0;
        var exceed_amount = 0;
        for(var i = 0; i < $scope.invoices.length; i++)
        {
            if(!parseFloat($scope.invoice_amount[i]))
                continue;

            if(!parseFloat($scope.amount))
            {
                $scope.invoice_amount[i] = 0;
                alert("Please Enter Amount");
                continue;
            }

            if(!parseFloat($scope.payment_receive_adjustment[i]))
                $scope.payment_receive_adjustment[i] = 0;
            

            if((parseFloat($scope.invoice_amount[i]) + parseFloat($scope.payment_receive_adjustment[i])) > $scope.invoices[i].due_amount)
            {
                $scope.invoice_amount[i] = parseFloat($scope.invoices[i].due_amount) - parseFloat($scope.payment_receive_adjustment[i]);
            }

            total_balance = total_balance + parseFloat($scope.invoice_amount[i]);
            if(total_balance > $scope.amount)
            {
                exceed_amount = total_balance - $scope.amount;
                total_balance = total_balance - parseFloat($scope.invoice_amount[i]);
                $scope.invoice_amount[index] = (parseFloat($scope.invoice_amount[index]) - exceed_amount - parseFloat($scope.payment_receive_adjustment[i]));
                total_balance = total_balance + parseFloat($scope.invoice_amount[i]);
            }

            $scope.used_amount = total_balance - exceed_amount;
            total_balance = total_balance - exceed_amount;
            $scope.excess_amount = (parseFloat($scope.amount) - parseFloat($scope.used_amount));
        }

        //adjustment
        //$scope.payment_receive_adjustment[index] = 0;
    }


    $scope.calculateAdjustment = function (index) {

        if(!parseFloat($scope.amount))
        {
            $scope.payment_receive_adjustment[index] = 0;
            alert("Please Enter Amount");
        }

        console.log($scope.invoice_amount_temp);

        if(($scope.invoice_amount_temp[index] - parseFloat($scope.payment_receive_adjustment[index])) < 0)
        {
            $scope.payment_receive_adjustment[index] = $scope.invoice_amount_temp[index];
            $scope.invoice_amount[index] = 0;
        }

        console.log($scope.invoice_amount_temp[index]);
        console.log(parseFloat($scope.payment_receive_adjustment[index]));

        if(!parseFloat($scope.payment_receive_adjustment[index]))
            $scope.payment_receive_adjustment[index] = 0;

        $scope.invoice_amount[index] = $scope.invoice_amount_temp[index] - parseFloat($scope.payment_receive_adjustment[index]);


        $scope.calculateExcessPayment(index);
    }


}