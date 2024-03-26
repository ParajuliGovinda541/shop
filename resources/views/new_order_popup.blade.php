<div id="newOrderPopup" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
        <h4 class="text-xl font-semibold mb-4">New Orders</h4>
        <p class="text-gray-700">Total New Orders: <span class="text-blue-500 font-semibold">{{ $totalNewOrders }}</span></p>
        <div class="mt-6 text-center">
            <button type="button" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 cursor-pointer" onclick="closePopup()">
                Close
            </button>
        </div>
    </div>
</div>