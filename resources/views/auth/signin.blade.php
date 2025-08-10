@include('auth.layouts.header')
  <body
    class="m-0 font-sans antialiased font-normal bg-white text-start text-base leading-default text-slate-500">
    <div class="container sticky top-0 z-sticky">
      <div class="flex flex-wrap -mx-3">
        <div class="w-full max-w-full px-3 flex-0">
          <!-- Navbar -->
          <nav
            class="absolute top-0 left-0 right-0 z-30 flex flex-wrap items-center px-4 py-2 mx-6 my-4 shadow-soft-2xl rounded-blur bg-white/80 backdrop-blur-2xl backdrop-saturate-200 lg:flex-nowrap lg:justify-start">
            <div
              class="flex items-center justify-center w-full p-0 pl-6 mx-auto flex-wrap-inherit">
              <a
                class="py-2.375 text-sm mr-4 ml-4 whitespace-nowrap font-bold text-slate-700 lg:ml-0"
                href="{{route('login')}}">
               Welcome to Team Management System
              </a>
              <button
                navbar-trigger
                class="px-3 py-1 ml-2 leading-none transition-all bg-transparent border border-transparent border-solid rounded-lg shadow-none cursor-pointer text-lg ease-soft-in-out lg:hidden"
                type="button"
                aria-controls="navigation"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span
                  class="inline-block mt-2 align-middle bg-center bg-no-repeat bg-cover w-6 h-6 bg-none">
                  <span
                    bar1
                    class="w-5.5 rounded-xs relative my-0 mx-auto block h-px bg-gray-600 transition-all duration-300"></span>
                  <span
                    bar2
                    class="w-5.5 rounded-xs mt-1.75 relative my-0 mx-auto block h-px bg-gray-600 transition-all duration-300"></span>
                  <span
                    bar3
                    class="w-5.5 rounded-xs mt-1.75 relative my-0 mx-auto block h-px bg-gray-600 transition-all duration-300"></span>
                </span>
              </button>
             
            </div>
          </nav>
        </div>
      </div>
    </div>
    <main class="mt-0 transition-all duration-200 ease-soft-in-out">
      <section>
        <div
          class="relative flex items-center p-0 overflow-hidden bg-center bg-cover min-h-75-screen">
          <div class="container z-10">
            <div class="flex flex-wrap mt-0 -mx-3">
              <div
                class="flex flex-col w-full max-w-full px-3 mx-auto md:flex-0 shrink-0 md:w-6/12 lg:w-5/12 xl:w-4/12">
                <div
                  class="relative flex flex-col min-w-0 mt-32 break-words bg-transparent border-0 shadow-none rounded-2xl bg-clip-border">
                  <div
                    class="p-6 pb-0 mb-0 bg-transparent border-b-0 rounded-t-2xl">
                    <h3
                      class="relative z-10 font-bold text-transparent bg-gradient-to-tl from-blue-600 to-cyan-400 bg-clip-text">
                      Welcome
                    </h3>
                    <p class="mb-0">Enter your email and password to sign in</p>
                  </div>
                  <div class="flex-auto p-6">
                    <form role="form" method="POST" action="{{ route('login.post') }}">
                      <label class="mb-2 ml-1 font-bold text-xs text-slate-700"
                        >Email</label
                      >
                      <div class="mb-4">
                        <input
                          type="email"
                          class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                          placeholder="Email"
                          aria-label="Email"
                          name="email"
                          aria-describedby="email-addon" />
                      </div>
                      <label class="mb-2 ml-1 font-bold text-xs text-slate-700"
                        >Password</label
                      >
                      <div class="mb-4">
                        <input
                          type="password"
                          class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow"
                          placeholder="Password"
                          aria-label="Password"
                        name="password"
                          aria-describedby="password-addon" />
                      </div>
                      <div class="min-h-6 mb-0.5 block pl-12">
                        <input
                          id="rememberMe"
                          class="mt-0.54 rounded-10 duration-250 ease-soft-in-out after:rounded-circle after:shadow-soft-2xl after:duration-250 checked:after:translate-x-5.25 h-5 relative float-left -ml-12 w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:content-[''] checked:border-slate-800/95 checked:bg-slate-800/95 checked:bg-none checked:bg-right"
                          type="checkbox"
                          checked="" />
                        <label
                          class="mb-2 ml-1 font-normal cursor-pointer select-none text-sm text-slate-700"
                          for="rememberMe"
                          >Remember me</label
                        >
                      </div>
                      <div class="text-center">
                        <button
                          type="submit"
                          class="inline-block w-full px-6 py-3 mt-6 mb-0 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft bg-gradient-to-tl from-blue-600 to-cyan-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85">
                          Sign in
                        </button>
                      </div>
                    </form>
                  </div>
                 
                </div>
              </div>
              <div class="w-full max-w-full px-3 lg:flex-0 shrink-0 md:w-6/12">
                <div
                  class="absolute top-0 hidden w-3/5 h-full -mr-32 overflow-hidden -skew-x-10 -right-40 rounded-bl-xl md:block">
                  <div
                    class="absolute inset-x-0 top-0 z-0 h-full -ml-16 bg-cover skew-x-10"
                    style="
                      background-image: url('../assets/img/curved-images/curved6.jpg');
                    "></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
@include('auth.layouts.footer')

