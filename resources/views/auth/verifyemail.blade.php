<x-layout>
    <x-slot:title>
        Verify Your Email Address
    </x-slot:title>

    <div class="max-w-md mx-auto mt-12">
        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <h1 class="text-2xl font-bold mb-4">Verify Your Email Address</h1>

                @if (session('resent'))
                    <div class="alert alert-success mb-4" role="alert">
                        A fresh verification link has been sent to your email address.
                    </div>
                @endif

                <p>Before proceeding, please check your email for a verification link.</p>
                <p>If you did not receive the email, click the button below to request another.</p>

                <form method="POST" action="{{ route('verification.resend') }}" class="mt-4">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-sm">
                        Resend Verification Email
                    </button>
                </form>
            </div>
        </div>
    </div>