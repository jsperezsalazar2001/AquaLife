<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Order_pdf_bill</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <b>{{ __('order_show.id') }}</b> {{ $data["order"]->getId() }}<br />
                <b>{{ __('order_show.payment_type') }} </b> {{ $data["order"]->getPaymentType() }}<br />
                <b>{{ __('order_show.total_price') }} </b> {{ $data["order"]->getTotalPrice() }}<br />
                @if($data["order"]->getStatus() == "Completed")
                    <b>{{ __('order_show.status') }} </b><strong class="order-completed"><i class="fa fa-check"></i> {{ $data["order"]->getStatus() }} </strong><br />
                @elseif($data["order"]->getStatus() == "Pending")
                    <b>{{ __('order_show.status') }} </b><strong class="order-pending"><i class="fa fa-clock"></i> {{ $data["order"]->getStatus() }} </strong><br />
                @elseif($data["order"]->getStatus() == "Delivering")
                    <b>{{ __('order_show.status') }} </b><strong class="order-delivering"><i class="fa fa-truck"></i> {{ $data["order"]->getStatus() }} </strong><br />
                @elseif($data["order"]->getStatus() == "Canceled")
                    <b>{{ __('order_show.status') }} </b><strong class="order-canceled"><i class="fa fa-times"></i> {{ $data["order"]->getStatus() }} </strong><br />
                @endif
                <b>{{ __('order_show.created_at') }} </b> {{ $data["order"]->getCreatedAt() }}<br />
                <b>{{ __('order_show.updated_at') }} </b> {{ $data["order"]->getUpdatedAt() }}<br /><br />
                @if(!empty($data["fish"]) and count($data["fish"]) > 0)
                <b>{{ __('order_show.fish_ordered') }} </b><br />
                    <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('fish_list.name') }}</th>
                            <th scope="col">{{ __('fish_list.price') }}</th>
                            <th scope="col">{{ __('order_show.quantity') }}</th>
                            <th scope="col">{{ __('order_list.subtotal') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data["fish"] as $fishOrder)
                        <tr>
                            <td>{{ $fishOrder->fish->getName() }}sf</td>
                            <td>{{ $fishOrder->fish->getPrice() }}</td>
                            <td>{{ $fishOrder->getquantity() }}</td>
                            <td>{{ $fishOrder->getSubtotal() }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
                <br />
                @if(!empty($data["accessories"]) and count($data["accessories"]) > 0)
                <b>{{ __('order_show.accessories_ordered') }} </b><br />
                    <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('accessory_list.name') }}</th>
                            <th scope="col">{{ __('accessory_list.price') }}</th>
                            <th scope="col">{{ __('order_show.quantity') }}</th>
                            <th scope="col">{{ __('order_list.subtotal') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data["accessories"] as $accessoryOrder)
                        <tr>
                            <td>{{ $accessoryOrder->accessory->getName() }}</td>
                            <td>{{ $accessoryOrder->accessory->getPrice() }}</td>
                            <td>{{ $accessoryOrder->getquantity() }}</td>
                            <td>{{ $accessoryOrder->getSubtotal() }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif 
            </div>
        </div>
    </div>
</body>
</html>