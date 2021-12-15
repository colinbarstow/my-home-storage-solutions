<div class="card card-custom gutter-b">
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">Products</span>
        </h3>
    </div>

    <div class="card-body pt-3 pb-0">
        {{-- Table --}}
        <div class="table-responsive">
            <table class="table table-borderless table-vertical-center">
                <thead>
                <tr>
                    <th class="p-0" style="width: 200px">Product</th>
                    <th class="p-0" style="min-width: 100px">Product amount</th>
                    <th class="p-0" style="min-width: 50px">Quantity</th>
                    <th class="p-0" style="min-width: 100px">Product Total</th>
                    <th class="p-0" style="min-width: 200px">Product Attributes</th>
                    <th class="p-0" style="min-width: 200px">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($order->products as $product)
                    <tr>
                        <td class="pl-0">
                            <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{ $product->title }}</a>
                        </td>

                        <td class="text-left">
            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                {{ $product->formattedPrice() }}
            </span>
                        </td>

                        <td class="text-left">
            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                x{{ $product->pivot->quantity }}
            </span>
                        </td>

                        <td class="text-left">
             <span class="text-dark-75 font-weight-bolder d-block font-size-lg">
                £{{ number_format(($product->price*$product->pivot->quantity)/100,2) }}
            </span>
                        </td>

                        <td class="text-left">
                            @foreach(json_decode($product->pivot->attributes, true) as $attribute)
                                @php($key = array_keys($attribute))
                                @php($value = array_values($attribute))
                                <span class="font-weight-500">
                                {{ $key[0] }}: {{ $value[0] }} {{ config('site_configurations.details.measurements') }}
                            </span>
                                <br>
                            @endforeach
                        </td>

                        <td>
                            @if($order->status !== 9)
                                <livewire:product-row :product="$product" :key="$product->id" :order="$order"/>

                            @else
                                <p>Order rejected and refunded - no further actions allowed</p>
                            @endif
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
