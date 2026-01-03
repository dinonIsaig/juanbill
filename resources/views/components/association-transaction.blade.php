@props(['transactionID', 'dueDate', 'datePaid', 'amount', 'status'])

@php
    // Extract Year and Month from datePaid if it exists
    $year = $datePaid ? date('Y', strtotime($datePaid)) : '';
    $month = $datePaid ? date('m', strtotime($datePaid)) : '';
    // Lowercase status for easier comparison (paid, pending, overdue)
    $cleanStatus = strtolower($status);
@endphp

<tr class="hover:bg-gray-100">
    <td class="table-rows">{{ $transactionID }}</td>
    <td class="table-rows">{{ $dueDate}}</td>
    <td class="table-rows">{{ $datePaid ?? '--' }}</td>
    <td class="table-rows">{{ $amount }}</td>
    @if ($status === 'Paid')
        <td class="table-rows "> <button class="paid" disabled> {{ $status }}</button></td>
    @elseif ($status === 'Pending')
        <td class="table-rows " > <button class="pending" disabled> {{ $status }}</button></td>
    @else
        <td class="table-rows "> <button class="overdue" disabled> {{ $status }}</button></td>
    @endif
    <td class="table-rows">
        @if ($status === 'Pending' || $status === 'Overdue')
        <button onclick="document.getElementById('paymentModal').classList.remove('hidden')" class="payment-btn">Pay</button>
        @endif
    </td>
</tr>
<x-payment-modal id="paymentModal" />
