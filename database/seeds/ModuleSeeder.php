<?php

use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql="INSERT INTO `modules` (`id`, `module_name`, `module_prefix`, `created_at`, `updated_at`) VALUES
(1, 'Contact', 'contact', '1973-04-16 13:24:06', '1970-02-18 21:40:51'),
(2, 'Contact Category', 'contact/category', '1980-12-15 22:30:11', '2004-08-24 17:21:48'),
(3, 'Account Chart', 'account-chart', '1984-11-05 09:25:32', '2011-04-08 18:16:26'),
(4, 'Inventory Item', 'inventory', '1976-01-01 14:37:21', '2011-01-17 10:38:00'),
(5, 'Inventory Category', 'inventory/category', '2008-12-23 14:08:37', '2016-07-15 16:14:45'),
(6, 'Stock Management', 'stock-management', '1995-11-02 14:06:00', '1993-06-12 03:55:21'),
(7, 'Product Track', 'product-track', '1991-08-20 18:53:28', '2000-11-09 19:34:04'),
(8, 'Manual Journal', 'manual-journal', '1985-07-22 15:50:23', '1999-05-03 22:58:28'),
(9, 'Bill', 'bill', '1978-10-09 13:33:25', '1991-03-04 14:30:42'),
(10, 'Credit Note', 'credit-note', '1982-09-24 19:04:00', '1991-02-24 21:22:01'),
(11, 'Credit Note Refund ', 'credit-note/refund', '1978-01-17 19:09:58', '1979-01-27 21:42:35'),
(12, 'Expense', 'expense', '1996-12-25 12:40:00', '2013-09-12 13:27:43'),
(13, 'Inventory', 'inventory', '1995-09-11 05:17:06', '1979-07-23 07:01:26'),
(14, 'Inventory Category', 'inventory/category', '1991-02-03 08:48:09', '1984-12-06 01:56:04'),
(15, 'Invoice', 'invoice', '2012-10-13 06:07:30', '2010-03-06 10:20:41'),
(16, 'Payment Made', 'payment-made', '1995-09-07 10:51:58', '1989-05-13 19:07:45'),
(17, 'Payment Received', 'payment-received', '2011-08-20 13:12:27', '1985-12-18 08:29:44'),
(18, 'Report', 'report', '2013-10-05 17:20:55', '1993-04-01 23:12:54'),
(19, 'Price List', 'price-list', '2017-08-27 12:00:00', '2017-08-27 12:00:00'),
(20, 'Bank', 'bank', '2017-08-27 12:00:00', '2017-08-27 12:00:00'),
(21, 'Income', 'income', '2017-08-27 12:00:00', '2017-08-27 12:00:00'),
(22, 'Estimate', 'estimate', '2017-08-27 12:00:00', '2017-08-27 12:00:00'),
(23, 'Sales Commission', 'Commission/Sales', '2017-08-27 12:00:00', '2017-08-27 12:00:00'),
(24, 'Ticket Dashboard', 'ticket/dashboard', '2017-08-27 12:00:00', '2017-08-27 12:00:00'),
(25, 'Ticket Order', 'ticket/order', '2017-08-27 12:00:00', '2017-08-27 12:00:00'),
(26, 'Ticket Document', 'ticket/document', '2017-08-27 12:00:00', '2017-08-27 12:00:00'),
(27, 'Ticket Commission', 'ticket/settings/commissions', '2017-08-27 12:00:00', '2017-08-27 12:00:00'),
(28, 'Ticket Hotel', 'ticket/hotel', '2017-08-27 12:00:00', '2017-08-27 12:00:00'),
(29, 'Ticket IATA Bill', 'ticket/IATA/bill', '2017-08-27 12:00:00', '2017-08-27 12:00:00'),
(30, 'Recruit Dashboard', 'recruitdashboard', '2017-08-27 12:00:00', '2017-08-27 12:00:00'),
(31, 'Recruite Company', 'company', '2017-08-27 12:00:00', '2017-08-27 12:00:00'),
(32, 'Visa', 'visa', '2017-08-27 12:00:00', '2017-08-27 12:00:00'),
(33, 'Visa Bill', 'visas/bill', '2017-08-27 12:00:00', '2017-08-27 12:00:00'),
(34, 'Visa Acceptance', 'visaacceptance', '2017-08-27 12:00:00', '2017-08-27 12:00:00'),
(35, 'Visa Form', 'visaform', '2017-08-27 12:00:00', '2017-08-27 12:00:00'),
(36, 'Recruit Order', 'order', '2017-08-27 12:00:00', '2017-08-27 12:00:00'),
(37, 'Recruit Order Invoice', 'order/invoice', '2017-08-27 12:00:00', '2017-08-27 12:00:00'),
(38, 'Recruit Order Account', 'order/accounts', '2017-08-27 12:00:00', '2017-08-27 12:00:00'),
(39, 'Recruit Account Expense', 'order/recruit/expense', '2017-08-27 12:00:00', '2017-08-27 12:00:00'),
(40, 'Recruit Account Expense Secror', 'order/expense/sector', '2017-08-27 12:00:00', '2017-08-27 12:00:00'),
(41, 'Customer', 'customer', '2017-08-27 12:00:00', '2017-08-27 12:00:00'),
(42, 'Customer Information', 'customer/information', '2017-08-27 12:00:00', '2017-08-27 12:00:00'),
(43, 'Customer Account', 'customer/account', '2017-08-27 12:00:00', '2017-08-27 12:00:00'),
(44, 'Okala', 'okala', '2017-08-27 12:00:00', '2017-08-27 12:00:00'),
(45, 'Gamca', 'gamca', '2017-08-27 12:00:00', '2017-08-27 12:00:00'),
(46, 'Medicalslip Report', 'medicalslip', '2017-08-27 12:00:00', '2017-08-27 12:00:00'),
(47, 'Mofa', 'mofa', '2017-08-27 12:00:00', '2017-08-27 12:00:00'),
(48, 'Fit Card', 'fitcard', '2017-10-12 18:00:00', '2017-10-12 18:00:00'),
(49, 'Police Clearance', 'police-clearance', '2017-10-12 18:00:00', '2017-10-12 18:00:00'),
(50, 'Musaned', 'musaned', '2017-08-27 12:00:00', '2017-08-27 12:00:00'),
(51, 'Visa Stamp', 'visastamp', '2017-08-27 12:00:00', '2017-08-27 12:00:00'),
(52, 'Finger', 'fingerprint', '2017-08-27 12:00:00', '2017-08-27 12:00:00'),
(53, 'Training', 'training', '2017-10-12 18:00:00', '2017-10-12 18:00:00'),
(54, 'Manpower', 'manpowers', '2017-08-27 12:00:00', '2017-08-27 12:00:00'),
(55, 'Completion', 'completion', '2017-10-12 18:00:00', '2017-10-12 18:00:00'),
(56, 'Submission', 'submission', '2017-10-12 18:00:00', '2017-10-12 18:00:00'),
(57, 'Confirmation', 'confirmation', '2017-10-12 18:00:00', '2017-10-12 18:00:00'),
(58, 'Flight', 'flight', '2017-08-27 12:00:00', '2017-08-27 12:00:00'),
(59, 'Document', 'document', '2017-08-27 12:00:00', '2017-08-27 12:00:00'),
(60, 'Document Category', 'document/category', '2017-08-27 12:00:00', '2017-08-27 12:00:00'),
(61, 'Form Basic', 'form_basis', '2017-08-27 12:00:00', '2017-08-27 12:00:00'),
(62, 'Form Medicalslip', 'medical_slip_form', '2017-08-27 12:00:00', '2017-08-27 12:00:00'),
(63, 'Form Agreement', 'agreement', '2017-08-27 12:00:00', '2017-08-27 12:00:00'),
(64, 'Form Non Objection', 'noobjection', '2017-08-27 12:00:00', '2017-08-27 12:00:00'),
(65, 'Form Visa Process', 'visaprocess', '2017-08-27 12:00:00', '2017-08-27 12:00:00'),
(66, 'Form Immigration', 'immigration', '2017-08-27 12:00:00', '2017-08-27 12:00:00'),
(67, 'Form Note Sheet', 'note_sheet', '2017-08-27 12:00:00', '2017-08-27 12:00:00'),
(68, 'Account Information Form', 'accountinformationform', '2017-09-12 12:00:00', '2017-09-12 12:00:00'),
(69, 'Execuitive Approval', 'execuitive', '2017-09-12 12:00:00', '2017-09-12 12:00:00'),
(70, 'Manager Approval ', 'manager', '2017-09-13 12:00:00', '2017-09-13 12:00:00'),
(71, 'Account Approval ', 'account', '2017-09-13 12:00:00', '2017-09-13 12:00:00'),
(72, 'Admin Approval ', 'admin', '2017-09-13 12:00:00', '2017-09-13 12:00:00'),
(73, 'Director Approval ', 'director', '2017-09-13 12:00:00', '2017-09-13 12:00:00'),
(74, 'Officer Approval ', 'officer', '2017-09-13 12:00:00', '2017-09-13 12:00:00');";

        DB::unprepared($sql);
    }
}
