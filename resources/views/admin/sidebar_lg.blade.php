<aside class="z-20 flex-shrink-0 hidden w-64 overflow-y-auto bg-white md:block" aria-label="aside">
    <div class="text-serv-bg">
        <div class="object-center mx-auto my-8" href="#">
            <a href="#" class="flex text-3xl ml-5 font-bold items-center">
                FREASE
            </a>
        </div>
        <div class="flex items-center pt-8 pl-5 space-x-2 border-t border-gray-100">
            @if(@Auth::user()->detail_user()->first()->photo)
            <img class="object-cover object-center mr-1 rounded-full w-14 h-14" src="{{ url(Storage::url(@Auth::user()->detail_user()->first()->photo)) }}" alt="" loading="lazy" />
            @else
            <svg class="object-cover object-center mr-1 rounded-full w-14 h-14 text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            @endif

            <div>
                <!--Author name-->
                <p class="font-semibold text-gray-900 text-md">{{ @Auth::user()->name ?? '' }}</p>
                <p class="text-sm font-light text-serv-text">
                    {{  @Auth::user()->detail_user()->first()->role}}
                </p>
            </div>
        </div>
        <ul class="mt-6">
            <li class="relative px-6 py-3">
                <a class="inline-flex items-center w-full text-sm font-medium text-gray-800 transition-colors duration-150 hover:text-gray-800" href="{{ route('member.dashboard.index') }}">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M19.5 16V9.02123C19.5 7.75027 18.896 6.55494 17.8728 5.80101L12.3728 1.74838C10.9618 0.708674 9.03823 0.708675 7.6272 1.74838L2.1272 5.80101C1.10401 6.55494 0.5 7.75027 0.5 9.02123V16C0.5 18.2091 2.29086 20 4.5 20H5.75C6.57843 20 7.25 19.3284 7.25 18.5V16C7.25 15.1716 7.92157 14.5 8.75 14.5H11.25C12.0784 14.5 12.75 15.1716 12.75 16V18.5C12.75 19.3284 13.4216 20 14.25 20H15.5C17.7091 20 19.5 18.2091 19.5 16Z"
                            fill="#082431"
                        />
                    </svg>
                    <span class="ml-4">Transaction</span>
                </a>
            </li>
        </ul>
        <ul class="mt-6">
            <li class="relative px-6 py-3">
                <a
                    class="inline-flex items-center w-full text-sm font-light transition-colors duration-150 hover:text-gray-800"
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                >
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="24" height="24" fill="white" />
                        <path d="M15 7.5V7C15 4.79086 13.2091 3 11 3H7C4.79086 3 3 4.79086 3 7V17C3 19.2091 4.79086 21 7 21H11C13.2091 21 15 19.2091 15 17V16.5" stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                        <path d="M18.5 9.5L20.8586 11.8586C20.9367 11.9367 20.9367 12.0633 20.8586 12.1414L18.5 14.5" stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                        <path d="M9.5 12L20 12" stroke="#082431" stroke-width="1.5" stroke-linecap="round" />
                    </svg>

                    <span class="ml-4">Logout</span>

                    <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                        @csrf
                    </form>
                </a>
            </li>
        </ul>
    </div>
</aside>
