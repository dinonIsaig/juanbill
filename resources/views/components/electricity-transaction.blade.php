@props(['transactionID', 'kwh', 'datePaid', 'amount', 'status'])

@php
    // Extract Year and Month from datePaid if it exists
    $year = $datePaid ? date('Y', strtotime($datePaid)) : '';
    $month = $datePaid ? date('m', strtotime($datePaid)) : '';
    // Lowercase status for easier comparison (paid, pending, overdue)
    $cleanStatus = strtolower($status);
@endphp

<tr class="hover:bg-gray-100 transaction-row"
    data-year="{{ $year }}"
    data-month="{{ $month }}"
    data-status="{{ $cleanStatus }}">
    
    <td class="table-rows">{{ $transactionID }}</td>
    <td class="table-rows">{{ $kwh }}</td>
    <td class="table-rows">{{ $datePaid ?? '--' }}</td>
    <td class="table-rows">{{ $amount }}</td>

    @if ($status === 'Paid')
        <td class="table-rows"> <button class="paid" disabled> {{ $status }}</button></td>
    @elseif ($status === 'Pending')
        <td class="table-rows"> <button class="pending" disabled> {{ $status }}</button></td>
    @else
        <td class="table-rows"> <button class="overdue" disabled> {{ $status }}</button></td>
    @endif

    <td class="table-rows">
        @if ($status === 'Pending' || $status === 'Overdue')
        <button  onclick="document.getElementById('paymentModal').classList.remove('hidden')" class="table-btn rounded-2 bg-primary text-white hover:bg-white hover:text-primary hover:ring-1">
            Pay</button>
        @endif
    </td>


</tr>
<x-payment-modal id="paymentModal" />
