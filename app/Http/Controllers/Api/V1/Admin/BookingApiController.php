<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Http\Resources\Admin\BookingResource;
use App\Models\Booking;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookingApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('booking_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BookingResource(Booking::with(['room', 'customer'])->get());
    }

    public function store(StoreBookingRequest $request)
    {
        $booking = Booking::create($request->validated());

        return (new BookingResource($booking))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Booking $booking)
    {
        abort_if(Gate::denies('booking_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BookingResource($booking->load(['room', 'customer']));
    }

    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        $booking->update($request->validated());

        return (new BookingResource($booking))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Booking $booking)
    {
        abort_if(Gate::denies('booking_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $booking->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
