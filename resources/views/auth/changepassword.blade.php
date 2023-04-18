@extends('layouts/contentNavbarLayout')

@section('title', 'Account settings - Account')

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Change Password</h5>
                <hr class="my-0">
                <div class="card-body">
                    <form id="formAccountSettings" action="{{ route('post-password') }}" method="POST">
                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="old_password" class="form-label">Old Password</label>
                                <input type="password" id="old_password"
                                    class="form-control @error('old_password') is-invalid @enderror" name="old_password"
                                    required autocomplete="old_password" value="{{ old('old_password') }}" autofocus>
                                @error('old_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="new_password" class="form-label">New Password</label>
                                <input type="password" id="new_password"
                                    class="form-control @error('new_password') is-invalid @enderror" name="new_password"
                                    required autocomplete="new_password" value="{{ old('new_password') }}" autofocus>
                                @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                                <label for="confirm_new_password" class="form-label">Confirm New Password</label>
                                <input type="password" id="confirm_new_password"
                                    class="form-control @error('confirm_new_password') is-invalid @enderror"
                                    value="{{ old('confirm_new_password') }}" name="confirm_new_password" required
                                    autocomplete="confirm_new_password" name="confirm_new_password">
                                @error('confirm_new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Save changes</button>
                            <a href="/dashboard"><button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Back</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
