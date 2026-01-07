@props(['bill'])

@php
    // 1. Extract values from the passed $bill object
    $transactionID = $bill->id;

    if ($bill->type === 'Electricity') {
        $consumption = $bill->consumption . ' kWh';
    } else {
        $consumption = $bill->consumption . ' cu. m';
    }

    $datePaid = $bill->date_paid ? $bill->date_paid->format('Y-m-d') : '--';
    $amount = '₱' . number_format($bill->amount, 2);

    // 2. Map Database Status
    $status = $bill->status;
    $unit = $bill->user ? $bill->user->unit_id : 'N/A';

    // 3. Data attributes for filtering
    $year = $bill->date_paid ? $bill->date_paid->format('Y') : '';
    $month = $bill->date_paid ? $bill->date_paid->format('m') : '';

    $paymentModalId = 'paymentModal-' . $transactionID;
@endphp

<tr class="hover:bg-gray-100 transaction-row" data-year="{{ $year }} " 
    data-month="{{ $month }}"
    data-status="{{ $status }}">

    <td class="table-rows">{{ $transactionID }}</td>
    @if ($bill->type === 'Electricity' || $bill->type === 'Water')
        <td class="table-rows">{{ $consumption }}</td>
        <td class="table-rows text-gray-500">{{ $bill->due_date->format('Y-m-d') }}</td>
    @else
        <td class="table-rows text-gray-500">{{ $bill->due_date->format('Y-m-d') }}</td>
    @endif    <td class="table-rows text-gray-500">{{ $datePaid }}</td>
    <td class="table-rows">{{ $amount }}</td>

    <td class="table-rows">{{ $unit }}</td>

    <td class="table-rows">

        @if ($status === 'Paid')
            <button class="paid" disabled>Paid</button>
        @elseif ($status === 'Unpaid')
            <button class="pending" disabled>Unpaid</button>
        @else
            <button class="overdue" disabled>{{ $status }}</button>
        @endif
    </td>

</tr>


