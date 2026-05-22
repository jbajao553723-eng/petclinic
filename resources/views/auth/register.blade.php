<x-guest-layout>

<div class="row w-100 shadow-lg rounded-5 overflow-hidden" style="max-width: 950px;">

    <!-- LEFT PANEL -->
    <div class="col-md-6 d-none d-md-flex align-items-center justify-content-center text-white"
         style="background: linear-gradient(135deg, #0d6efd, #4f8cff); min-height:520px;">

        <div class="text-center p-5">

            <h1 class="fw-bold mb-2"
                style="font-size: 2.4rem; letter-spacing: 0.5px;">
               Join Us!
            </h1>

            <p class="mt-3 mb-0"
               style="font-size: 1.05rem; opacity: 0.85; line-height: 1.6;">
                Create your account<br>
                
            </p>

        </div>

    </div>

    <!-- RIGHT PANEL -->
    <div class="col-md-6 bg-white d-flex align-items-center justify-content-center p-5">

        <div style="width:100%; max-width:380px;">

            <!-- TITLE -->
            <h3 class="text-center fw-semibold mb-4"
                style="font-size: 1.6rem;">
                Create Account
            </h3>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label" style="font-size: 0.95rem;">Name</label>
                    <input type="text"
                           name="name"
                           class="form-control form-control-lg rounded-3"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label" style="font-size: 0.95rem;">Email</label>
                    <input type="email"
                           name="email"
                           class="form-control form-control-lg rounded-3"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label" style="font-size: 0.95rem;">Password</label>
                    <input type="password"
                           name="password"
                           class="form-control form-control-lg rounded-3"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label" style="font-size: 0.95rem;">Confirm Password</label>
                    <input type="password"
                           name="password_confirmation"
                           class="form-control form-control-lg rounded-3"
                           required>
                </div>

                <button class="btn btn-primary w-100 py-2 rounded-3"
                        style="font-size: 1rem;">
                    Register
                </button>

            </form>

            <p class="text-center mt-3"
               style="font-size: 0.9rem; color: #6c757d;">
                Already have an account?
                <a href="{{ route('login') }}" class="fw-semibold text-primary text-decoration-none">
                    Login
                </a>
            </p>

        </div>

    </div>

</div>

</x-guest-layout>