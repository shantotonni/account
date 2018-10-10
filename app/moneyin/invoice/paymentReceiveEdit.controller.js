var invoice = angular.module('app', []);
invoice.controller('PaymentReceiveEditController', PaymentReceiveEditController);

function PaymentReceiveEditController($scope, $http) {

    $scope.invoice_amount_temp = [];
    $scope.payment_receive_adjustment = [];
    $scope.payment_receive_note = [];

    $( document.body ).click(function() {
        $scope.calculateExcessPayment(0);
    });


    var payment_receive_id = document.getElementsByName('payment_receive_id')[0].value;

    $http
        .get(window.location.origin + "/api/payment-receive/get-payment-receive-entry/" + payment_receive_id, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined, 'Process-Data': false}
        })
        .then(function(response){
            $scope.payment_receive_entry = response.data.payment_receive_entry;
            customer_id           = response.data.customer_id;
            account_id          = response.data.account_id;
            customer              = response.data.customer;
            paid_receives       = response.data.paid_receives;
            payment_receive_amount = response.data.payment_receive_amount;

            $scope.amount = payment_receive_amount;
            $scope.amount_received = payment_receive_amount;

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

            var dropdownlist = $("#customer_id").data("kendoDropDownList");
            dropdownlist.value(customer_id);

            var dropdownlist = $("#account_id").data("kendoDropDownList");
            dropdownlist.value(account_id);

            $scope.account_type = account_id;

            $http
                .get(window.location.origin + "/api/payment-receive/get-customer-invoice-edit/" + payment_receive_id, {
                    transformRequest: angular.identity,
                    headers: {'Content-Type': undefined, 'Process-Data': false}
                })
                .then(function(response){
                    var element = {};
                    var data = [];
                    var j = 0;
                    for(var i = 0; i < response.data.invoices.length; i++)
                    {
                        element.id                          = response.data.invoices[i].id;
                        element.invoice_date                = response.data.invoices[i].invoice_date;
                        element.invoice_number              = response.data.invoices[i].invoice_number;
                        element.payment_receive_adjustment  = response.data.invoices[i].pr_adjustment;
                        element.payment_receive_note        = response.data.invoices[i].pr_note;
                        element.amount                      = response.data.invoices[i].total_amount;
                        element.due_amount                  = response.data.invoices[i].due_amount;

                        if(response.data.invoices[i].id == $scope.payment_receive_entry[j].invoice_id)
                        {
                            element.payment = $scope.payment_receive_entry[j].amount;
                            j++;
                            if(j == $scope.payment_receive_entry.length)
                            {
                                j = 0;
                            }
                        }
                        else
                        {
                            element.payment = 0;
                        }

                        data.push(element);
                        element = {};
                    }
                    if (data.length==0) {
                        $http
                            .get(window.location.origin + "/api/payment-receive/get-customer-invoice/" + customer_id, {
                                transformRequest: angular.identity,
                                headers: {'Content-Type': undefined, 'Process-Data': false}
                            })
                            .then(function(response){
                                $scope.invoices = response.data.invoices;
                                console.log($scope.invoices);
                            });
                    }
                    $scope.invoices = data;
                    console.log($scope.invoices);

                })
                .finally(function () {
                    $scope.ShowAmount();
                    $scope.calculateExcessPayment(0);
                });
        });

    $scope.getAccountType = function () {
        $scope.account_type = $("#account_id").data("kendoDropDownList").value();
    }

    $scope.ShowAmount = function () {
        $scope.invoice_amount = [];
        for(var i = 0; i < $scope.invoices.length; i++)
        {
            $scope.invoice_amount[i]                = $scope.invoices[i].payment;
            $scope.payment_receive_adjustment[i]    = $scope.invoices[i].payment_receive_adjustment;
            $scope.invoice_amount_temp[i]           = $scope.invoices[i].payment;
            $scope.payment_receive_note[i]          = $scope.invoices[i].payment_receive_note;
        }
    }


    $scope.amountReceived = function () {
        // $scope.amount_received = $scope.amount;
        // $scope.calculateExcessPayment(0);

        $scope.amount_received = parseFloat($scope.amount);
        var received_amount = parseFloat($scope.amount_received);
        for(var i = 0; i < $scope.invoices.length; i++)
        {
            if(received_amount > ($scope.invoices[i].due_amount + $scope.invoices[i].payment))
            {
                $scope.invoice_amount[i] = parseFloat($scope.invoices[i].due_amount) + $scope.invoices[i].payment;
                $scope.invoice_amount_temp[i] = parseFloat($scope.invoices[i].due_amount) + $scope.invoices[i].payment;
                received_amount = parseFloat(received_amount - ($scope.invoices[i].due_amount + $scope.invoices[i].payment));
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


            if((parseFloat($scope.invoice_amount[i]) + parseFloat($scope.payment_receive_adjustment[i])) > ($scope.invoices[i].due_amount + $scope.invoices[i].payment))
            {
                $scope.invoice_amount[i] = parseFloat($scope.invoices[i].due_amount + $scope.invoices[i].payment);
            }

            total_balance = total_balance + parseFloat($scope.invoice_amount[i]);
            if(total_balance > $scope.amount)
            {
                exceed_amount = total_balance - $scope.amount;
                total_balance = total_balance - parseFloat($scope.invoice_amount[i]);
                $scope.invoice_amount[index] = (parseFloat($scope.invoice_amount[index]) - exceed_amount);
                total_balance = total_balance + parseFloat($scope.invoice_amount[i]);
            }

            $scope.used_amount = total_balance - exceed_amount;
            total_balance = total_balance - exceed_amount;
            $scope.excess_amount = (parseFloat($scope.amount) - parseFloat($scope.used_amount));
        }
    }

    $scope.calculateAdjustment = function (index) {

        if(!parseFloat($scope.amount))
        {
            $scope.payment_receive_adjustment[index] = 0;
            alert("Please Enter Amount");
        }

        if(($scope.invoice_amount_temp[index] - parseFloat($scope.payment_receive_adjustment[index])) < 0)
        {
            $scope.payment_receive_adjustment[index] = $scope.invoice_amount_temp[index];
            $scope.invoice_amount[index] = 0;
        }

        if(!parseFloat($scope.payment_receive_adjustment[index]))
            $scope.payment_receive_adjustment[index] = 0;

        $scope.invoice_amount[index] = $scope.invoice_amount_temp[index] - parseFloat($scope.payment_receive_adjustment[index]);


        $scope.calculateExcessPayment(index);
    }

}