<div class="dashboard-sidebar xl:w-[306px] w-full h-fit rounded-[10px] bg-white">
    @php
        $user = Auth::user();
    @endphp
    <div class="relative flex justify-between items-center">
        <button
            class="absolute w-10 aspect-square bg-buisness-red/10 flex justify-center items-center rounded-full -left-5 text-black z-10 hover:bg-buisness-red hover:text-white  xl:hidden"
            id="prevButton">
            <svg class="rotate-180" width="6" height="12" viewBox="0 0 6 12" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M0.75 10.5L4.54289 6.70711C4.87623 6.37377 5.04289 6.20711 5.04289 6C5.04289 5.79289 4.87623 5.62623 4.54289 5.29289L0.75 1.5"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                </path>
            </svg>
        </button>

        <div class="w-full">
            <form id="userImageForm" enctype="multipart/form-data">
                @csrf
                <div class="flex gap-5 items-center p-7 pb-0">
                    <div class="relative w-[66px] aspect-square">
                        <img src="{{ asset($user->image) }}" alt="" class="rounded-full" id="user-img-preview" />
                        <label for="user-img"
                            class="absolute bottom-0 -right-1 text-white bg-main-black rounded-full p-2 cursor-pointer">
                            <svg width="11" height="11" viewBox="0 0 11 11" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3.40569 9.75234C2.67255 9.01664 1.93165 8.2727 1.18945 7.5279C3.07253 5.63883 4.95818 3.74672 6.83996 1.85938C7.57483 2.59854 8.31487 3.34291 9.04931 4.08164C7.1727 5.96725 5.28747 7.86153 3.40569 9.75234Z"
                                    fill="white" />
                                <path
                                    d="M9.65426 3.49537C9.6228 3.45985 9.59478 3.42475 9.56332 3.39312C8.87715 2.70291 8.19056 2.01271 7.50396 1.3225C7.43026 1.24841 7.43112 1.24885 7.50568 1.17346C7.78325 0.89486 8.06212 0.617564 8.3371 0.335936C8.50519 0.163493 8.69915 0.0421759 8.94008 0.0105468C9.23963 -0.0288812 9.51418 0.0404428 9.73615 0.248848C9.99001 0.487149 10.2314 0.738881 10.4771 0.985848C10.5783 1.08767 10.6788 1.19035 10.7766 1.29521C11.0749 1.6154 11.077 2.0595 10.7723 2.37276C10.4133 2.74234 10.046 3.10413 9.68227 3.46938C9.6771 3.47458 9.6715 3.47891 9.65426 3.49451V3.49537Z"
                                    fill="white" />
                                <path
                                    d="M2.80077 10.3859C2.68353 10.4145 2.58182 10.4396 2.4801 10.4643C1.75902 10.6398 1.03838 10.8157 0.317301 10.9903C0.126795 11.0362 -0.0283674 10.898 0.00438919 10.7035C0.0367148 10.5124 0.0845566 10.3239 0.126364 10.1346C0.266873 9.49983 0.407812 8.86509 0.548321 8.22991C0.553493 8.20738 0.55651 8.18485 0.569009 8.15625C1.31681 8.89022 2.05211 9.63458 2.80077 10.3859Z"
                                    fill="white" />
                            </svg>
                        </label>
                        <input type="file" name="image" id="user-img" class="absolute w-0 h-0 -z-50 opacity-0" />
                    </div>
                    <div class="">
                        <h4 class="text-20 sm:text-24 font-semibold">{{ $user->name }}</h4>
                    </div>
                </div>
            </form>

            <div class="flex xl:flex-col flex-row gap-5 xl:gap-2.5 w-full overflow-x-auto snap-x snap-mandatory relative scrollbar-hide p-6"
                id="scrollContainer">
                <a href="{{ route('user.dashboard') }}"
                    class="{{ request()->routeIs('user.dashboard') ? 'xl:bg-buisness-gray  text-main-black' : 'xl:bg-transparent text-paragraph' }} xl:hover:bg-buisness-gray font-medium group hover:text-main-black  xl:px-30 rounded-[10px] py-2.5 text-14 xl:text-16 transition-all duration-300 flex items-center gap-1 xl:gap-4 scroll-section snap-start w-full">
                    <span class="text-primary-400 group-hover:text-primary-400">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M17.5999 22.5608H6.39985C4.57984 22.5608 2.91985 21.1608 2.61985 19.3608L1.28984 11.4008C1.07984 10.1608 1.67985 8.57084 2.66985 7.78084L9.59986 2.23079C10.9399 1.15079 13.0498 1.1608 14.3998 2.2408L21.3299 7.78084C22.3099 8.57084 22.9099 10.1608 22.7099 11.4008L21.3799 19.3608C21.0799 21.1308 19.3899 22.5608 17.5999 22.5608ZM11.9899 2.94082C11.4599 2.94082 10.9298 3.10079 10.5398 3.41079L3.60985 8.96084C3.03985 9.42084 2.64986 10.4408 2.76986 11.1608L4.09986 19.1208C4.27986 20.1708 5.32984 21.0608 6.39985 21.0608H17.5999C18.6699 21.0608 19.7198 20.1708 19.8998 19.1108L21.2298 11.1508C21.3498 10.4308 20.9499 9.40083 20.3899 8.95083L13.4599 3.41079C13.0599 3.10079 12.5299 2.94082 11.9899 2.94082Z"
                                fill="currentColor" />
                            <path
                                d="M12 16.25C10.21 16.25 8.75 14.79 8.75 13C8.75 11.21 10.21 9.75 12 9.75C13.79 9.75 15.25 11.21 15.25 13C15.25 14.79 13.79 16.25 12 16.25ZM12 11.25C11.04 11.25 10.25 12.04 10.25 13C10.25 13.96 11.04 14.75 12 14.75C12.96 14.75 13.75 13.96 13.75 13C13.75 12.04 12.96 11.25 12 11.25Z"
                                fill="currentColor" />
                        </svg>
                    </span>
                    <span class="text-16 flex-1 text-nowrap"> {{ __('Dashboard') }} </span>
                </a>
                <a href="{{ route('user.wishlist.index') }}"
                    class="{{ request()->routeIs('user.wishlist.*') ? 'xl:bg-buisness-gray text-main-black ' : 'xl:bg-transparent text-paragraph' }} xl:hover:bg-buisness-gray font-normal group hover:text-main-black  xl:px-30 rounded-[10px] py-2.5 text-14 xl:text-16 transition-all duration-300 flex items-center gap-1 xl:gap-4 scroll-section snap-start w-full">
                    <span class="text-black group-hover:text-main-black">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.765 4.70229L12 5.52422L11.235 4.70229C9.12233 2.43257 5.69709 2.43257 3.58447 4.70229C1.47184 6.972 1.47184 10.6519 3.58447 12.9217L10.4699 20.3191C11.315 21.227 12.685 21.227 13.5301 20.3191L20.4155 12.9217C22.5282 10.6519 22.5282 6.972 20.4155 4.70229C18.3029 2.43257 14.8777 2.43257 12.765 4.70229Z"
                                stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                        </svg>

                    </span>
                    <span class="text-16 flex-1 text-nowrap"> {{ __('Wishlist') }} </span>
                </a>
                <a href="{{ route('user.orders') }}"
                    class="{{ request()->routeIs('user.orders') ? 'xl:bg-buisness-gray text-main-black ' : 'xl:bg-transparent text-paragraph' }} xl:hover:bg-buisness-gray font-normal group hover:text-main-black  xl:px-30 rounded-[10px] py-2.5 text-14 xl:text-16 transition-all duration-300 flex items-center gap-1 xl:gap-4 scroll-section snap-start w-full">
                    <span class="text-black group-hover:text-main-black">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 12H11.25C11.25 12.3228 11.4566 12.6094 11.7628 12.7115L12 12ZM12.75 7C12.75 6.58579 12.4142 6.25 12 6.25C11.5858 6.25 11.25 6.58579 11.25 7H12.75ZM14.7628 13.7115C15.1558 13.8425 15.5805 13.6301 15.7115 13.2372C15.8425 12.8442 15.6301 12.4195 15.2372 12.2885L14.7628 13.7115ZM12 12H12.75V7H12H11.25V12H12ZM12 12L11.7628 12.7115L14.7628 13.7115L15 13L15.2372 12.2885L12.2372 11.2885L12 12ZM22 12H21.25C21.25 17.1086 17.1086 21.25 12 21.25V22V22.75C17.9371 22.75 22.75 17.9371 22.75 12H22ZM12 22V21.25C6.89137 21.25 2.75 17.1086 2.75 12H2H1.25C1.25 17.9371 6.06294 22.75 12 22.75V22ZM2 12H2.75C2.75 6.89137 6.89137 2.75 12 2.75V2V1.25C6.06294 1.25 1.25 6.06294 1.25 12H2ZM12 2V2.75C17.1086 2.75 21.25 6.89137 21.25 12H22H22.75C22.75 6.06294 17.9371 1.25 12 1.25V2Z"
                                fill="currentColor" />
                        </svg>
                    </span>
                    <span class="text-16 flex-1 text-nowrap"> {{ __('Order List') }} </span>
                </a>
                <a href="{{ route('user.subscriptions.history') }}"
                    class="{{ request()->routeIs('user.subscriptions.history') || request()->routeIs('user.subscriptions.*') ? 'xl:bg-buisness-gray text-main-black ' : 'xl:bg-transparent text-paragraph' }} xl:hover:bg-main-gray font-normal  group hover:text-main-black  xl:px-30 rounded-[10px] py-2.5 text-14 xl:text-16 transition-all duration-300 flex items-center gap-1 xl:gap-4 scroll-section snap-start w-full">
                    <span class="text-black group-hover:text-main-black">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6 3H18C19.6569 3 21 4.34315 21 6V18C21 19.6569 19.6569 21 18 21H6C4.34315 21 3 19.6569 3 18V6C3 4.34315 4.34315 3 6 3Z"
                                stroke="currentColor" stroke-width="1.5" />
                            <path d="M7 8H17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            <path d="M7 12H17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            <path d="M7 16H13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                    </span>
                    <span class="text-16 flex-1 text-nowrap"> {{ __('Subscription History') }} </span>
                </a>
                <a href="{{ route('user.transactions') }}"
                    class="{{ request()->routeIs('user.transactions') ? 'xl:bg-buisness-gray text-main-black ' : 'xl:bg-transparent text-paragraph' }} xl:hover:bg-buisness-gray font-normal group hover:text-main-black  xl:px-30 rounded-[10px] py-2.5 text-14 xl:text-16 transition-all duration-300 flex items-center gap-1 xl:gap-4 scroll-section snap-start w-full">
                    <span class="text-black group-hover:text-main-black">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 22.5C17.79 22.5 22.5 17.79 22.5 12C22.5 6.21 17.79 1.5 12 1.5C6.21 1.5 1.5 6.21 1.5 12C1.5 17.79 6.21 22.5 12 22.5ZM12 3C16.965 3 21 7.035 21 12C21 16.965 16.965 21 12 21C7.035 21 3 16.965 3 12C3 7.035 7.035 3 12 3Z"
                                fill="currentColor" />
                            <path
                                d="M7.4999 11.2504H16.4999C16.9144 11.2504 17.2499 10.9145 17.2499 10.5004C17.2499 10.0862 16.9144 9.75037 16.4999 9.75037H8.90143L9.62398 8.6664C9.85363 8.32177 9.76055 7.85595 9.416 7.62637C9.0707 7.39605 8.60518 7.48942 8.37598 7.83435L6.87598 10.0843C6.72253 10.3143 6.70828 10.6102 6.83863 10.8541C6.96928 11.098 7.22338 11.2504 7.4999 11.2504Z"
                                fill="currentColor" />
                            <path
                                d="M7.5 14.25H15.0989L14.3759 15.334C14.146 15.6786 14.239 16.1444 14.5839 16.374C14.7122 16.4594 14.8565 16.5 14.9993 16.5C15.2417 16.5 15.4797 16.3828 15.624 16.166L17.124 13.916C17.2771 13.6861 17.2917 13.3901 17.1614 13.1462C17.031 12.9023 16.7768 12.75 16.5 12.75H7.5C7.08585 12.75 6.75 13.0859 6.75 13.5C6.75 13.9141 7.08585 14.25 7.5 14.25Z"
                                fill="currentColor" />
                        </svg>
                    </span>
                    <span class="text-16 flex-1 text-nowrap"> {{ __('Transaction') }} </span>
                </a>
                <a href="{{ route('user-order.reviews') }}"
                    class="{{ request()->routeIs('user-order.reviews') ? 'xl:bg-buisness-gray text-main-black ' : 'xl:bg-transparent text-paragraph' }} xl:hover:bg-buisness-gray font-normal group hover:text-main-black  xl:px-30 rounded-[10px] py-2.5 text-14 xl:text-16 transition-all duration-300 flex items-center gap-1 xl:gap-4 scroll-section snap-start w-full">
                    <span class="text-black group-hover:text-main-black">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.0328 3.27141C10.8375 1.5762 13.1625 1.57619 13.9672 3.27141L15.3579 6.20118C15.6774 6.87435 16.2951 7.34094 17.0096 7.44888L20.1193 7.91869C21.9187 8.19053 22.6371 10.4895 21.3351 11.8091L19.0849 14.0896C18.5679 14.6136 18.332 15.3685 18.454 16.1084L18.9852 19.3285C19.2926 21.1918 17.4116 22.6126 15.8022 21.7329L13.0208 20.2126C12.3817 19.8633 11.6183 19.8633 10.9792 20.2126L8.19776 21.7329C6.58839 22.6126 4.70742 21.1918 5.01479 19.3286L5.54599 16.1084C5.66804 15.3685 5.43211 14.6136 4.91508 14.0896L2.66488 11.8091C1.36287 10.4895 2.08133 8.19053 3.88066 7.91869L6.99037 7.44888C7.70489 7.34094 8.32257 6.87435 8.64211 6.20118L10.0328 3.27141Z"
                                stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                        </svg>

                    </span>
                    <span class="text-16 flex-1 text-nowrap"> {{ __('Reviews') }} </span>
                </a>
                <a href="{{ route('user.ticket-support.index') }}"
                    class="{{ request()->routeIs('user.ticket-support.*') ? 'xl:bg-buisness-gray text-main-black ' : 'xl:bg-transparent text-paragraph' }} xl:hover:bg-buisness-gray font-normal group hover:text-main-black  xl:px-30 rounded-[10px] py-2.5 text-14 xl:text-16 transition-all duration-300 flex items-center gap-1 xl:gap-4 scroll-section snap-start w-full">
                    <span class="text-black group-hover:text-main-black">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8 2V5M16 2V5M3.5 9.09H20.5M21 8.5V17C21 20 19.5 22 16 22H8C4.5 22 3 20 3 17V8.5C3 5.5 4.5 3.5 8 3.5H16C19.5 3.5 21 5.5 21 8.5Z"
                                stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M15.6947 13.7H15.7037M15.6947 16.7H15.7037M11.9955 13.7H12.0045M11.9955 16.7H12.0045M8.29431 13.7H8.30329M8.29431 16.7H8.30329"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                    <span class="text-16 flex-1 text-nowrap"> {{ __('Support Ticket') }} </span>
                    @if($total_unseen_support_messages_for_user > 0)
                        <span
                            class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">{{ $total_unseen_support_messages_for_user }}</span>
                    @endif
                </a>
                <a href="{{ route('user.edit-profile') }}"
                    class="{{ request()->routeIs('user.edit-profile') ? 'xl:bg-buisness-gray text-main-black ' : 'xl:bg-transparent text-paragraph' }} xl:hover:bg-buisness-gray font-normal group hover:text-main-black  xl:px-30 rounded-[10px] py-2.5 text-14 xl:text-16 transition-all duration-300 flex items-center gap-1 xl:gap-4 scroll-section snap-start w-full">
                    <span class="text-black group-hover:text-main-black">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <ellipse cx="12" cy="17.5" rx="7" ry="3.5" stroke="currentColor" stroke-width="1.5"
                                stroke-linejoin="round" />
                            <circle cx="12" cy="7" r="4" stroke="currentColor" stroke-width="1.5"
                                stroke-linejoin="round" />
                        </svg>
                    </span>
                    <span class="text-16 flex-1 text-nowrap"> {{ __('Profile Settings') }} </span>
                </a>
                <a href="{{ route('user.change-password') }}"
                    class="{{ request()->routeIs('user.change-password') ? 'xl:bg-buisness-gray text-main-black ' : 'xl:bg-transparent text-paragraph' }} xl:hover:bg-buisness-gray font-normal group hover:text-main-black  xl:px-30 rounded-[10px] py-2.5 text-14 xl:text-16 transition-all duration-300 flex items-center gap-1 xl:gap-4 scroll-section snap-start w-full">
                    <span class="text-black group-hover:text-main-black">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="4" y="7" width="16" height="14" rx="4" stroke="currentColor" stroke-width="1.5" />
                            <circle cx="12" cy="14" r="2" stroke="currentColor" stroke-width="1.5" />
                            <path d="M16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7" stroke="currentColor"
                                stroke-width="1.5" />
                        </svg>
                    </span>
                    <span class="text-16 flex-1 text-nowrap"> {{ __('Change Password') }} </span>
                </a>

                <button id="accountDeleteBtn" popovertarget="accountDelete" popovertargetaction="show"
                    class="xl:bg-transparent xl:hover:bg-buisness-gray font-normal text-paragraph group hover:text-main-black xl:px-30 rounded-[10px] py-2.5 text-14 xl:text-16 transition-all duration-300 flex items-center gap-1 xl:gap-4 scroll-section snap-start">
                    <span class="text-black group-hover:text-main-black">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5 8V18C5 20.2091 6.79086 22 9 22H15C17.2091 22 19 20.2091 19 18V8M14 11V17M10 11L10 17M16 5L14.5937 2.8906C14.2228 2.3342 13.5983 2 12.9296 2H11.0704C10.4017 2 9.7772 2.3342 9.40627 2.8906L8 5M16 5H8M16 5H21M8 5H3"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </span>
                    <span class="text-16 flex-1 text-nowrap w-full text-left">
                        {{ __('Delete Account') }} </span>
                </button>

                <button id="logoutBtn" popovertarget="logout" popovertargetaction="show"
                    class="xl:bg-transparent xl:hover:bg-buisness-gray font-normal text-paragraph group hover:text-main-black xl:px-30 rounded-[10px] py-2.5 text-14 xl:text-16 transition-all duration-300 flex items-center gap-1 xl:gap-4 scroll-section snap-start">
                    <span class="text-black group-hover:text-main-black">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 14L21.2929 12.7071C21.6834 12.3166 21.6834 11.6834 21.2929 11.2929L20 10"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M21 12H13M6 20C3.79086 20 2 18.2091 2 16V8C2 5.79086 3.79086 4 6 4M6 20C8.20914 20 10 18.2091 10 16V8C10 5.79086 8.20914 4 6 4M6 20H14C16.2091 20 18 18.2091 18 16M6 4H14C16.2091 4 18 5.79086 18 8"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                    </span>
                    <span class="text-16 flex-1 text-nowrap w-full text-left"> {{ __('Logout') }}
                    </span>
                </button>
            </div>
        </div>

        <button
            class="absolute w-10 aspect-square bg-buisness-red/10 flex justify-center items-center rounded-full -right-3  text-black hover:bg-buisness-red hover:text-white xl:hidden"
            id="nextButton">
            <svg width="6" height="12" viewBox="0 0 6 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M0.75 10.5L4.54289 6.70711C4.87623 6.37377 5.04289 6.20711 5.04289 6C5.04289 5.79289 4.87623 5.62623 4.54289 5.29289L0.75 1.5"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                </path>
            </svg>
        </button>
    </div>
</div>
<!-- modals -->
