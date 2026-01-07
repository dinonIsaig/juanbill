    @props(['bills'])

<div class="bg-white rounded-lg shadow-md p-8 max-md:p-4">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-xl font-bold text-primary">Recent Transactions</h2>
        <span class="text-sm text-neutral-gray">Last 3 months till now</span>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full table-auto border-collapse">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="table-headers">Transaction ID</th>
                    <th class="table-headers">Category</th>
                    <th class="table-headers">Date Paid</th>
                    <th class="table-headers">Due Date</th>
                    <th class="table-headers">Amount</th>
                    <th class="table-headers">Status</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($bills as $bill)
                    <tr class="hover:bg-gray-100 transition-colors text-center">

                        <td class="table-rows">
                            {{ $bill->id }}
                        </td>

                        <td class="table-rows">
                            <span class="px-2 py-1 rounded-md text-xs bg-[#e0e7f3] bg-opacity-90 text-[#0038A8] font-medium">
                                {{ ucfirst($bill->type) }}
                            </span>
                        </td>

                        <td class="table-rows text-gray-500">
                            {{ $bill->date_paid ? $bill->date_paid->format('M d, Y') : '-' }}
                        </td>

                        <td class="table-rows text-gray-500">
                            {{ $bill->due_date->format('M d, Y') }}
                        </td>

                        <td class="table-rows">
                            ₱{{ number_format($bill->amount, 2) }}
                        </td>

                        <td class="table-rows">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Paid
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-10 text-center text-gray-500">
                            No paid transactions found in the last 3 months.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <x-bills-footer :items="$bills" />
</div>
