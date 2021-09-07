@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="flex flex-wrap">
        <div class="w-full pt-6 lg:w-64 lg:pt-0">
            @include('admin.message.nav-messages')
        </div>

        <div class="w-1 flex-grow lg:pl-4">
            <div class="card bg-blueGray-100">
                <div class="card-header border-b border-blueGray-200">
                    <div class="flex flex-col lg:flex-row lg:justify-between">
                        <h6 class="card-title">
                            {{ __('global.new_message') }}
                        </h6>
                    </div>

                </div>

                <div class="card-body">
                    <form action="{{ route('admin.messages.store') }}" method="POST" class="pt-3">
                        @csrf
                        <div class="form-group {{ $errors->has('to') ? 'invalid' : '' }}">
                            <div class="flex flex-col lg:flex-row lg:items-center">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold lg:w-20 pb-3 lg:pb-0" for="to">
                                    {{ __('global.to') }}
                                </label>
                                <select name="to[]" id="to" class="select2 form-control" required multiple>
                                    <option></option>
                                    <option value="null" disabled>{{ __('global.pleaseSelect') }}</option>
                                    @foreach($users as $id => $email)
                                        <option value="{{ $id }}">{{ $email }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="validation-message">
                                {{ $errors->first('to') }}
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('subject') ? 'invalid' : '' }}">
                            <div class="flex flex-col lg:flex-row lg:items-center ">
                                <label class="block uppercase text-blueGray-600 text-xs font-bold lg:w-20 pb-3 lg:pb-0" for="subject">
                                    {{ __('global.subject') }}
                                </label>
                                <input class="form-control" type="text" name="subject" id="subject" required placeholder="{{ __('global.subject') }}">
                            </div>
                            <div class="validation-message">
                                {{ $errors->first('subject') }}
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('body') ? 'invalid' : '' }}">
                            <textarea class="form-control" name="body" id="body" required rows="8" placeholder="{{ __('global.body') }}"></textarea>
                            <div class="validation-message">
                                {{ $errors->first('body') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-indigo mr-2" type="submit">
                                {{ trans('global.send') }}
                            </button>
                            <a href="{{ route('admin.messages.index') }}" class="btn btn-secondary">
                                {{ trans('global.discard') }}
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        $(function(){
    $('#to').select2({
        placeholder: '{{ __('global.pleaseSelect') }}',
        allowClear: false
    })
});
    </script>
@endpush