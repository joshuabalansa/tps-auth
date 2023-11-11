@foreach ($orderDetails as $orderDetail)
    {{ $orderDetail->getOrderNumber() }}
    {{ $orderDetail->category }}
    {{ $orderDetail->quantity }}
    {{ $orderDetail->quantity }}
    {{ $orderDetail->price }}
    {{ $orderDetail->status }}
@endforeach
