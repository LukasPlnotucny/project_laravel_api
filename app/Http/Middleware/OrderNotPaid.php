<?php

namespace App\Http\Middleware;

use App\Repositories\OrderRepository;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderNotPaid
{
    public function __construct (
        protected OrderRepository $orderRepository
    ) {}

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $order_id = $request->route('id');

        $order = $this->orderRepository->getOrderById($order_id);

        if ($order->paid_date) return response()->json([ 'error' => 'Already paid order.' ], Response::HTTP_UNPROCESSABLE_ENTITY);

        return $next($request);
    }
}
