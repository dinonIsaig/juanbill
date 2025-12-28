<tr class="hover:bg-gray-100">
    <td class="table-rows">{{ $transactionID }}</td>
    <td class="table-rows">{{ $kwh }}</td>
    <td class="table-rows">{{ $datePaid }}</td>
    <td class="table-rows">{{ $amount }}</td>
    @if ($status === 'Paid')
        <td class="table-rows "> <button class="paid" disabled> {{ $status }}</button></td>
    @elseif ($status === 'Pending')
        <td class="table-rows "> <button class="pending" disabled> {{ $status }}</button></td>
    @else
        <td class="table-rows "> <button class="overdue" disabled> {{ $status }}</button></td>
    @endif
    <td class="table-rows">
        @if ($status === 'Pending')
        <button class="table-btn rounded-2 bg-primary text-white ">Pay</button>
        @endif
    </td>
</tr>


