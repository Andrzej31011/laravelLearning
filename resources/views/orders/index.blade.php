<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <p>This is the dashboard page</p>
                <form method="post" action="{{ route('cart.store') }}">
                    @csrf <!-- Dodaj CSRF token do formularza -->
                    <button type="submit" class="btn btn-primary">Wykonaj Akcję</button>
                </form>
            </div>
        </div>
    </div>


<table>
   	<thead>
       	<tr>
           	<th>Product</th>
           	<th>Qty</th>
           	<th>Price</th>
           	<th>Subtotal</th>
       	</tr>
   	</thead>

   	<tbody>

   		<?php foreach(Cart::content() as $row) :?>

       		<tr>
           		<td>
               		<p><strong><?php echo $row->name; ?></strong></p>
               		<p><?php echo ($row->options->has('size') ? $row->options->size : ''); ?></p>
           		</td>
           		<td><input type="text" value="<?php echo $row->qty; ?>"></td>
           		<td>$<?php echo $row->price; ?></td>
           		<td>$<?php echo $row->total; ?></td>
       		</tr>

	   	<?php endforeach;?>

   	</tbody>

   	<tfoot>
   		<tr>
   			<td colspan="2">&nbsp;</td>
   			<td>Subtotal</td>
   			<td><?php echo Cart::subtotal(); ?></td>
   		</tr>
   		<tr>
   			<td colspan="2">&nbsp;</td>
   			<td>Tax</td>
   			<td><?php echo Cart::tax(); ?></td>
   		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
			<td>Transaction cost</td>
			<td><?php echo Cart::getCost(\Gloudemans\Shoppingcart\Cart::COST_TRANSACTION); ?></td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
			<td>Transaction cost</td>
			<td><?php echo Cart::getCost(\Gloudemans\Shoppingcart\Cart::COST_SHIPPING); ?></td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
			<td>Transaction cost</td>
			<td><?php echo Cart::getCost('somethingelse'); ?></td>
		</tr>
   		<tr>
   			<td colspan="2">&nbsp;</td>
   			<td>Total</td>
   			<td><?php echo Cart::total(); ?></td>
   		</tr>
   	</tfoot>
</table>
</x-app-layout>

