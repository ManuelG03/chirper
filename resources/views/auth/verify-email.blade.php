<x-layout>
    <x-slot:title>
        Verify Email
    </x-slot:title>

    <div class="max-w-2xl mx-auto">
        <div class="card bg-base-100 shadow mt-8">
            <div class="card-body">
                <h1 class="text-3xl font-bold mb-4">Verify Your Email</h1>
                
                <p class="mb-4">
                    Thanks for signing up! Please verify your email address by clicking the link we just sent to your inbox.
                </p>

                <p class="mb-6 text-base-content/60">
                    If you didn't receive the email, we can send you another one.
                </p>

                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary">
                        Resend Verification Email
                    </button>
                </form>

                <form method="POST" action="/logout" class="mt-4">
                    @csrf
                    <button type="submit" class="btn btn-ghost">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
