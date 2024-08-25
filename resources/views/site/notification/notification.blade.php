@extends('../site/layouts.user_panel.app')
@section('page_title', __('x', ['x' => __('Address')]))
@section('content')
    <div class="dark:bg-red-1 h-full xl:px-74p px-5 pt-30p xl:pt-14">
        <div>
            <div class="flex items-center">
                <span class="mr-4 lg:mt-0 mt-1">
                    <svg class="h-30p w-10 lg:w-53p lg:h-11" xmlns="http://www.w3.org/2000/svg" width="53" height="44" viewBox="0 0 53 44" fill="none">
                        <rect x="36.1779" y="27.377" width="16.6222" height="16.6222" rx="2" fill="#FCCA19" />
                        <rect width="32.2667" height="32.2667" rx="2" fill="#FCCA19" />
                    </svg>
                </span>
                <h1 class="dark:text-gray-2 dm-sans font-medium lg:pt-0 text-2xl lg:text-4xl text-gray-12 mb-1 dark:text-gray-2">
                    {{ __('Notifications') }}
                </h1>
            </div>
            <p class="dark:text-gray-2 lg:mt-1.5 roboto-medium font-medium text-base lg:text-xl mt-4 text-20 text-gray-10 leading-6">
                {{ __('All the notifications you received from us..') }}</p>
            <p class="lg:mt-90p mt-10 dm-bold lg:hidden block font-bold text-gray-12 lg:text-2xl text-lg uppercase">{{ __('Notifications') }}</p>
        </div>
        <div>
            <div class="lg:flex lg:justify-between lg:mt-7 mt-15p">
                <div class="mt-14 lg:block hidden dm-bold font-bold text-gray-12 lg:text-2xl text-lg uppercase">
                    <p>{{ __('notifications') }}</p>
                </div>
                <div class="flex justify-between lg:mt-10 mt-15p">
                    <h1 class="dm-sans font-medium mt-2 lg:text-lg text-sm whitespace-nowrap lg:mr-15p mr-0 text-gray-12 ">
                        {{ __('Filter By') }}
                    </h1>
                    <div class="flex">
                        <div x-data="{ dropdownOpen: false }">
                            <div>
                                <button @click="dropdownOpen = !dropdownOpen" class="inline-flex justify-between lg:w-168p w-24 border border-gray-2 px-2 lg:py-2.5 py-1 bg-white text-sm font-medium text-gray-10 hover:bg-gray-11 ">
                                    <div class="roboto-medium font-medium text-gray-10 lg:text-base text-xss whitespace-nowrap dark:text-gray-2 ">
                                        @php
                                            $filterDay = [
                                                'today' => __('Today'),
                                                'last_week' => __('Last 7 Days'),
                                                'last_month' => __('Last 30 Days'),
                                                'last_year' => __('Last 12 Months'),
                                                'all_time' => __('All Time'),
                                            ];
                                        @endphp
                                        @foreach ($filterDay as $key => $value)
                                            @if (request('filter_day') == $key)
                                                <span>{{ $value }}</span>
                                            @elseif(request('filter_day') == null && $key === 'all_time')
                                                <span>{{ __('All Time') }}</span>
                                            @endif
                                        @endforeach
                                        @if (request('filter_day') && !in_array(request('filter_day'), array_flip($filterDay)))
                                            <span>{{ __('All Time') }}</span>
                                        @endif
                                    </div>
                                    <span class="mt-2 hidden lg:block">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="7" viewBox="0 0 13 7" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.89383e-08 1.21895L1.37054 1.63436e-08L6.5 4.5621L11.6295 1.3868e-07L13 1.21895L6.5 7L6.89383e-08 1.21895Z"
                                                fill="#898989" />
                                        </svg>
                                    </span>
                                    <span class=" mt-2 lg:hidden block">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="8" height="4" viewBox="0 0 8 4" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.93933e-08 0.696543L0.843412 1.00576e-08L4 2.60691L7.15659 8.53415e-08L8 0.696543L4 4L3.93933e-08 0.696543Z" fill="#898989" />
                                        </svg>
                                    </span>
                                </button>
                            </div>
                            <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full z-10">
                            </div>
                            <div x-show="dropdownOpen" class="absolute lg:w-168p w-24 border-t-0 border-gray-2 border bg-white z-20">
                                @foreach ($filterDay as $key => $value)
                                    <a href="{{ request()->fullUrlWithQuery(['filter_day' => $key]) }}" class="block whitespace-nowrap pt-3.5 lg:w-168p w-24 lg:text-sm text-xss roboto-medium text-gray-10 font-medium border-t-0 capitalize lg:h-47p hover:bg-gray-11 hover:text-gray-12">
                                        @if (request('filter_day') == $key)
                                            <span class="text-green-1 ml-1">✓</span>
                                            <span class="inline-block ml-1.5 lg:ml-3 text-green-1">{{ $value }}</span>
                                        @elseif(request('filter_day') == null && $key === 'all_time')
                                            <span class="text-green-1 ml-1.5 lg:ml-1">✓</span>
                                            <span class="inline-block lg:ml-1 pb-2 text-green-1">{{ __('All Time') }}</span>
                                        @else
                                            <span class="inline-block ml-1.5 lg:ml-2">{{ $value }}</span>
                                        @endif
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        <div x-data="{ dropdownOpen: false }">
                            <div class="flex items-center ml-3">
                                <button @click="dropdownOpen = !dropdownOpen" class="inline-flex justify-between lg:w-168p w-24 rounded-sm border border-gray-2 px-2 lg:py-2.5 py-1 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none dark:bg-gray-2">
                                    <div class="roboto-medium font-medium text-gray-10 lg:text-base text-xss whitespace-nowrap dark:text-gray-2"> <span>{{ __('Read') }}</span>
                                    </div>
                                    <span class="mt-2 hidden lg:block">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="7" viewBox="0 0 13 7" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.89383e-08 1.21895L1.37054 1.63436e-08L6.5 4.5621L11.6295 1.3868e-07L13 1.21895L6.5 7L6.89383e-08 1.21895Z" fill="#898989" />
                                        </svg>
                                    </span>
                                    <span class=" mt-2 lg:hidden block">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="8" height="4" viewBox="0 0 8 4" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.93933e-08 0.696543L0.843412 1.00576e-08L4 2.60691L7.15659 8.53415e-08L8 0.696543L4 4L3.93933e-08 0.696543Z" fill="#898989" />
                                        </svg>
                                    </span>
                                </button>
                            </div>
                            <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full z-10">
                            </div>
                            <div x-show="dropdownOpen" class="absolute lg:w-168p w-24 border-t-0 border-gray-2 border bg-white z-20 ml-3">
                                <a href="javascript:void(0)" class=" block whitespace-nowrap py-2.5 lg:w-168p w-24 lg:text-sm text-xss roboto-medium text-gray-10 font-medium border-t-0 capitalize lg:h-47p hover:bg-gray-11 hover:text-gray-12">
                                    <span class="ml-2">{{ __('Read') }}</span>
                                </a>
                                <a href="javascript:void(0)" class=" block whitespace-nowrap py-2.5 lg:w-168p w-24 lg:text-sm text-xss roboto-medium text-gray-10 font-medium border-t-0 capitalize lg:h-47p hover:bg-gray-11 hover:text-gray-12">
                                    <span class="ml-2">{{ __('Unread') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="lg:mt-30p mt-15p lg:mb-30p mb-6">
            <div class="cursor-pointer transition delay-150 bg-white hover:bg-gray-11 border border-gray-2 rounded lg:px-30p px-3 lg:flex items-center justify-between">
                <div class="flex justify-between gap-2 py-2">
                    <div class="rounded-full lg:block hidden bg-gray-15 p-2 h-10 w-10 my-30p ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M6.50248 6.97519C6.78492 4.15083 9.16156 2 12 2C14.8384 2 17.2151 4.15083 17.4975 6.97519L17.7841 9.84133C17.8016 10.0156 17.8103 10.1028 17.8207 10.1885C17.9649 11.3717 18.3717 12.5077 19.0113 13.5135C19.0576 13.5865 19.1062 13.6593 19.2034 13.8051L20.0645 15.0968C20.8508 16.2763 21.244 16.866 21.0715 17.3412C21.0388 17.4311 20.9935 17.5158 20.9368 17.5928C20.6371 18 19.9283 18 18.5108 18H5.48923C4.07168 18 3.36291 18 3.06318 17.5928C3.00651 17.5158 2.96117 17.4311 2.92854 17.3412C2.75601 16.866 3.14916 16.2763 3.93548 15.0968L4.79661 13.8051C4.89378 13.6593 4.94236 13.5865 4.98873 13.5135C5.62832 12.5077 6.03508 11.3717 6.17927 10.1885C6.18972 10.1028 6.19844 10.0156 6.21587 9.84133L6.50248 6.97519Z" fill="#2C2C2C" />
                            <path d="M10.0681 20.6294C10.1821 20.7357 10.4332 20.8297 10.7825 20.8967C11.1318 20.9637 11.5597 21 12 21C12.4403 21 12.8682 20.9637 13.2175 20.8967C13.5668 20.8297 13.8179 20.7357 13.9319 20.6294" stroke="#2C2C2C" stroke-width="2" stroke-linecap="round" />
                        </svg>
                    </div>
                    <div class="rounded-full lg:hidden block bg-gray-15 p-2 h-7 w-7 my-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="11" height="10" viewBox="0 0 24 24" fill="none">
                            <path d="M6.50248 6.97519C6.78492 4.15083 9.16156 2 12 2C14.8384 2 17.2151 4.15083 17.4975 6.97519L17.7841 9.84133C17.8016 10.0156 17.8103 10.1028 17.8207 10.1885C17.9649 11.3717 18.3717 12.5077 19.0113 13.5135C19.0576 13.5865 19.1062 13.6593 19.2034 13.8051L20.0645 15.0968C20.8508 16.2763 21.244 16.866 21.0715 17.3412C21.0388 17.4311 20.9935 17.5158 20.9368 17.5928C20.6371 18 19.9283 18 18.5108 18H5.48923C4.07168 18 3.36291 18 3.06318 17.5928C3.00651 17.5158 2.96117 17.4311 2.92854 17.3412C2.75601 16.866 3.14916 16.2763 3.93548 15.0968L4.79661 13.8051C4.89378 13.6593 4.94236 13.5865 4.98873 13.5135C5.62832 12.5077 6.03508 11.3717 6.17927 10.1885C6.18972 10.1028 6.19844 10.0156 6.21587 9.84133L6.50248 6.97519Z" fill="#2C2C2C" />
                            <path d="M10.0681 20.6294C10.1821 20.7357 10.4332 20.8297 10.7825 20.8967C11.1318 20.9637 11.5597 21 12 21C12.4403 21 12.8682 20.9637 13.2175 20.8967C13.5668 20.8297 13.8179 20.7357 13.9319 20.6294" stroke="#2C2C2C" stroke-width="2" stroke-linecap="round" />
                        </svg>
                    </div>
                    <div class="flex flex-col justify-center">
                        <p class="roboto-medium font-medium lg:text-base text-11 lg:ml-5 ml-2.5 text-gray-10 hover:text-gray-12 "> {{ __("GREAT NEWS! We are really excited to announce that our app version of multi-vendor will be launched on 1 Feb, 2022. Stay tuned.") }}</p>
                        <p class="roboto-medium font-medium text-gray-10 lg:text-sm text-xss lg:ml-5 ml-2.5 mt-2"> 17 Feb, 2022 8:01 am</p>                    
                    </div>
                </div>

                <div class="flex gap-3 items-center lg:w-[150px] justify-end pb-2 lg:pb-0">                    
                    {{-- read and unread button --}}
                    <a href="javascript:void(0)" class="read-toggleButton">
                        <svg class="icon1" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.71998 1.71967C2.01287 1.42678 2.48775 1.42678 2.78064 1.71967L5.50969 4.44872C5.55341 4.48345 5.59378 4.52354 5.62977 4.5688L13.423 12.3621C13.4739 12.4011 13.5204 12.4471 13.561 12.5L16.2806 15.2197C16.5735 15.5126 16.5735 15.9874 16.2806 16.2803C15.9877 16.5732 15.5129 16.5732 15.22 16.2803L12.8547 13.915C11.771 14.5491 10.479 15 9.00031 15C6.85406 15 5.10432 14.0515 3.80787 12.9694C2.51318 11.8889 1.62553 10.6393 1.18098 9.93536C1.1751 9.92606 1.16907 9.91657 1.16291 9.90687C1.07468 9.768 0.960135 9.5877 0.902237 9.33506C0.85549 9.13108 0.855506 8.86871 0.902276 8.66474C0.960212 8.41207 1.07508 8.23131 1.16354 8.09212C1.16975 8.08235 1.17583 8.07278 1.18175 8.06341C1.63353 7.34824 2.55099 6.05644 3.89682 4.95717L1.71998 2.78033C1.42709 2.48744 1.42709 2.01256 1.71998 1.71967ZM4.96371 6.02406C3.73433 6.99464 2.87554 8.19074 2.44991 8.86452C2.42329 8.90666 2.40463 8.93624 2.38903 8.96192C2.37862 8.97905 2.37176 8.99088 2.36719 8.99912C2.36719 8.99941 2.36719 8.99969 2.36719 8.99998C2.36719 9.00029 2.36719 9.00059 2.36719 9.00089C2.3717 9.00902 2.37845 9.02067 2.38868 9.0375C2.40417 9.06302 2.42272 9.09243 2.44923 9.1344C2.84872 9.76697 3.6393 10.8749 4.76902 11.8178C5.89697 12.7592 7.31781 13.5 9.00031 13.5C10.015 13.5 10.9334 13.2311 11.7506 12.8109L10.5242 11.5845C10.0776 11.8483 9.55635 12 9.00031 12C7.34346 12 6.00031 10.6569 6.00031 9C6.00031 8.44396 6.15203 7.92272 6.41579 7.47614L4.96371 6.02406ZM7.551 8.61135C7.51791 8.73524 7.50031 8.86549 7.50031 9C7.50031 9.82843 8.17188 10.5 9.00031 10.5C9.13482 10.5 9.26507 10.4824 9.38896 10.4493L7.551 8.61135ZM9.00031 4.5C8.71392 4.5 8.43614 4.52137 8.1669 4.56117C7.75714 4.62176 7.37586 4.33869 7.31527 3.92893C7.25469 3.51917 7.53776 3.13789 7.94751 3.0773C8.28789 3.02698 8.63899 3 9.00031 3C11.1466 3 12.8963 3.94854 14.1928 5.03057C15.4874 6.11113 16.3751 7.36072 16.8196 8.06464C16.8255 8.07394 16.8316 8.08343 16.8377 8.09312C16.9259 8.23201 17.0405 8.41232 17.0984 8.66498C17.1451 8.86897 17.1451 9.13136 17.0983 9.33533C17.0404 9.58804 16.9253 9.76906 16.8367 9.90844C16.8305 9.91825 16.8244 9.92786 16.8184 9.93727C16.5797 10.3152 16.2174 10.8436 15.7374 11.4168C15.4715 11.7344 14.9985 11.7763 14.6809 11.5104C14.3633 11.2445 14.3214 10.7714 14.5873 10.4539C15.0158 9.94209 15.3393 9.47006 15.5503 9.13608C15.577 9.09384 15.5957 9.06416 15.6114 9.0384C15.6219 9.02109 15.6288 9.00916 15.6334 9.00086C15.6334 9.00059 15.6334 9.00031 15.6334 9.00003C15.6334 8.99972 15.6334 8.99942 15.6334 8.99911C15.6289 8.99099 15.6222 8.97934 15.6119 8.9625C15.5965 8.93698 15.5779 8.90757 15.5514 8.8656C15.1519 8.23303 14.3613 7.12506 13.2316 6.18218C12.1037 5.24078 10.6828 4.5 9.00031 4.5Z" fill="#6A6B87"></path>
                        </svg>
                        <svg class="icon2" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.76901 6.18218C3.63929 7.12505 2.84871 8.23303 2.44922 8.8656C2.42271 8.90757 2.40417 8.93697 2.38868 8.96248C2.37845 8.97932 2.3717 8.99097 2.36719 8.99909C2.36719 8.99939 2.36719 8.9997 2.36719 9C2.36719 9.0003 2.36719 9.00061 2.36719 9.00091C2.3717 9.00903 2.37845 9.02068 2.38868 9.03752C2.40417 9.06303 2.42271 9.09243 2.44922 9.1344C2.84871 9.76697 3.63929 10.8749 4.76901 11.8178C5.89696 12.7592 7.3178 13.5 9.0003 13.5C10.6828 13.5 12.1036 12.7592 13.2316 11.8178C14.3613 10.8749 15.1519 9.76697 15.5514 9.1344C15.5779 9.09243 15.5964 9.06303 15.6119 9.03751C15.6222 9.02068 15.6289 9.00903 15.6334 9.00091C15.6334 9.00061 15.6334 9.0003 15.6334 9C15.6334 8.9997 15.6334 8.99939 15.6334 8.99909C15.6289 8.99097 15.6222 8.97932 15.6119 8.96249C15.5964 8.93697 15.5779 8.90757 15.5514 8.8656C15.1519 8.23303 14.3613 7.12505 13.2316 6.18218C12.1036 5.24077 10.6828 4.5 9.0003 4.5C7.3178 4.5 5.89696 5.24078 4.76901 6.18218ZM3.80786 5.03057C5.10431 3.94854 6.85405 3 9.0003 3C11.1466 3 12.8963 3.94854 14.1927 5.03057C15.4874 6.11113 16.3751 7.36071 16.8196 8.06464C16.8255 8.07394 16.8315 8.08343 16.8377 8.09313C16.9259 8.23198 17.0405 8.41227 17.0984 8.66488C17.1451 8.86884 17.1451 9.13116 17.0984 9.33512C17.0405 9.58773 16.9259 9.76802 16.8377 9.90687C16.8315 9.91657 16.8255 9.92606 16.8196 9.93536C16.3751 10.6393 15.4874 11.8889 14.1927 12.9694C12.8963 14.0515 11.1466 15 9.0003 15C6.85405 15 5.10431 14.0515 3.80786 12.9694C2.51318 11.8889 1.62553 10.6393 1.18097 9.93536C1.17509 9.92606 1.16906 9.91657 1.1629 9.90688C1.07469 9.76802 0.960152 9.58774 0.902251 9.33512C0.8555 9.13116 0.8555 8.86884 0.902251 8.66488C0.960152 8.41226 1.07469 8.23198 1.1629 8.09312C1.16906 8.08343 1.17509 8.07394 1.18097 8.06464C1.62553 7.36071 2.51318 6.11113 3.80786 5.03057ZM9.0003 7.5C8.17188 7.5 7.5003 8.17157 7.5003 9C7.5003 9.82843 8.17188 10.5 9.0003 10.5C9.82873 10.5 10.5003 9.82843 10.5003 9C10.5003 8.17157 9.82873 7.5 9.0003 7.5ZM6.0003 9C6.0003 7.34315 7.34345 6 9.0003 6C10.6572 6 12.0003 7.34315 12.0003 9C12.0003 10.6569 10.6572 12 9.0003 12C7.34345 12 6.0003 10.6569 6.0003 9Z" fill="#6A6B87"></path>
                        </svg>
                    </a>

                    <div x-data="{ notific_dlt_modal: false }" :class="{ 'overflow-y-hidden': notific_dlt_modal }">
                        <main class="w-full flex flex-col sm:flex-row items-center">
                            <div class="flex flex-col">
                                <div class="flex items-center justify-center">
                                    <button @click="notific_dlt_modal = true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.02924 12.0576C5.55357 12.0576 5.16797 11.672 5.16797 11.1963L5.16797 8.61252C5.16797 8.13685 5.55357 7.75124 6.02924 7.75124C6.50491 7.75124 6.89052 8.13685 6.89052 8.61252L6.89052 11.1963C6.89052 11.672 6.50491 12.0576 6.02924 12.0576Z" fill="#898989"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.47456 12.0576C8.99889 12.0576 8.61328 11.672 8.61328 11.1963L8.61328 8.61252C8.61328 8.13685 8.99889 7.75124 9.47456 7.75124C9.95022 7.75124 10.3358 8.13685 10.3358 8.61252L10.3358 11.1963C10.3358 11.672 9.95023 12.0576 9.47456 12.0576Z" fill="#898989"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.883875 5.18226C0.67977 5.16833 0.413088 5.16786 0 5.16786V3.44531C0.00921245 3.44531 0.0183945 3.44531 0.0275462 3.44531C0.0460398 3.44531 0.0644092 3.44531 0.082654 3.44531H15.4203C15.4385 3.44531 15.4569 3.44531 15.4754 3.44531L15.5029 3.44531V5.16786C15.0899 5.16786 14.8232 5.16833 14.6191 5.18226C14.4227 5.19565 14.3479 5.21858 14.3121 5.23342C14.101 5.32084 13.9334 5.48851 13.846 5.69954C13.8311 5.73538 13.8082 5.81017 13.7948 6.00654C13.7809 6.21064 13.7804 6.47732 13.7804 6.89041L13.7804 12.1147C13.7804 12.8783 13.7805 13.5361 13.7097 14.0629C13.6337 14.6275 13.4626 15.1687 13.0236 15.6077C12.5847 16.0466 12.0435 16.2178 11.4789 16.2937C10.9521 16.3645 10.2942 16.3645 9.53072 16.3644H5.97222C5.20871 16.3645 4.55086 16.3645 4.02406 16.2937C3.45948 16.2178 2.91829 16.0466 2.47933 15.6077C2.04037 15.1687 1.8692 14.6275 1.7933 14.0629C1.72247 13.5361 1.7225 12.8783 1.72255 12.1148L1.72255 6.89041C1.72255 6.47732 1.72208 6.21064 1.70816 6.00654C1.69476 5.81017 1.67183 5.73538 1.65699 5.69954C1.56957 5.48851 1.40191 5.32084 1.19087 5.23342C1.15503 5.21858 1.08024 5.19565 0.883875 5.18226ZM12.2067 5.16786H3.29627C3.37705 5.40696 3.41026 5.64815 3.42671 5.88928C3.44512 6.15908 3.44511 6.48506 3.4451 6.86286L3.4451 12.0581C3.4451 12.8944 3.44693 13.4351 3.50048 13.8334C3.55071 14.207 3.6318 14.3241 3.69736 14.3896C3.76292 14.4552 3.88001 14.5363 4.25358 14.5865C4.65193 14.6401 5.19256 14.6419 6.02892 14.6419H9.47402C10.3104 14.6419 10.851 14.6401 11.2494 14.5865C11.6229 14.5363 11.74 14.4552 11.8056 14.3896C11.8711 14.3241 11.9522 14.207 12.0025 13.8334C12.056 13.4351 12.0578 12.8944 12.0578 12.0581V6.86286C12.0578 6.48506 12.0578 6.15908 12.0762 5.88928C12.0927 5.64815 12.1259 5.40696 12.2067 5.16786Z" fill="#898989"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.96309 0.104413C8.59794 0.0343653 8.17358 0 7.75221 0C7.33084 5.1336e-08 6.90648 0.0343654 6.54133 0.104413C6.35878 0.139431 6.18006 0.185421 6.01815 0.246001C5.87108 0.301027 5.6705 0.39238 5.5008 0.550715C5.153 0.875213 5.13412 1.42022 5.45862 1.76801C5.76482 2.0962 6.26738 2.13152 6.61529 1.8618C6.61728 1.86102 6.61944 1.8602 6.62178 1.85932C6.66773 1.84213 6.74756 1.81881 6.86585 1.79612C7.10237 1.75074 7.4152 1.72255 7.75221 1.72255C8.08922 1.72255 8.40205 1.75074 8.63857 1.79612C8.75686 1.81881 8.83669 1.84213 8.88264 1.85932C8.88498 1.8602 8.88714 1.86102 8.88913 1.8618C9.23704 2.13152 9.7396 2.0962 10.0458 1.76801C10.3703 1.42021 10.3514 0.875212 10.0036 0.550714C9.83392 0.392379 9.63334 0.301026 9.48627 0.246001C9.32436 0.185421 9.14564 0.13943 8.96309 0.104413Z" fill="#898989"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </main>
                        <!-- Modal1 -->
                        <div class="fixed inset-0 w-full h-full bg-black bg-opacity-50 z-50 pt-60 duration-300 overflow-y-auto" x-show="notific_dlt_modal" x-transition:enter="transition duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                            <div class="relative sm:w-3/4 md:w-1/2 lg:w-1/2 xl:w-1/3 mx-2 sm:mx-auto my-10 opacity-100">
                                <div class="relative bg-white shadow-lg p-4 rounded-md text-gray-900 z-50" @click.away="notific_dlt_modal = false" x-show="notific_dlt_modal" x-transition:enter="transition transform duration-300" x-transition:enter-start="scale-0" x-transition:enter-end="scale-100" x-transition:leave="transition transform duration-300" x-transition:leave-start="scale-100" x-transition:leave-end="scale-0" style="display: none;">
                                    <svg class="lg:block hidden  ltr:ml-auto rtl:mr-auto cursor-pointer hover:text-gray-12 text-gray-10" @click="notific_dlt_modal = false" xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.455612 0.455612C1.06309 -0.151871 2.04802 -0.151871 2.6555 0.455612L11.9888 9.78895C12.5963 10.3964 12.5963 11.3814 11.9888 11.9888C11.3814 12.5963 10.3964 12.5963 9.78895 11.9888L0.455612 2.6555C-0.151871 2.04802 -0.151871 1.06309 0.455612 0.455612Z" fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.9887 0.455612C11.3812 -0.151871 10.3963 -0.151871 9.78884 0.455612L0.455503 9.78895C-0.151979 10.3964 -0.151979 11.3814 0.455503 11.9888C1.06298 12.5963 2.04791 12.5963 2.65539 11.9888L11.9887 2.6555C12.5962 2.04802 12.5962 1.06309 11.9887 0.455612Z" fill="currentColor"></path>
                                    </svg>
                                    <div>
                                        <div class="flex">
                                            <div class="flex flex-col justify-center bg-red-100 ltr:ml-4 rtl:mr-4 items-center h-10 w-10 rounded-full dark:text-gray-2">
                                                <svg class="lg:w-8 lg:h-8 w-26p h-26p" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                                                    <circle cx="16" cy="16" r="16" fill="#F9E8E8"></circle>
                                                    <path d="M17.7925 8L17.5367 18.9463H15.3411L15.0746 8H17.7925ZM15 22.3037C15 21.9129 15.1279 21.586 15.3837 21.3231C15.6466 21.0531 16.009 20.9181 16.4709 20.9181C16.9256 20.9181 17.2845 21.0531 17.5474 21.3231C17.8103 21.586 17.9417 21.9129 17.9417 22.3037C17.9417 22.6803 17.8103 23.0036 17.5474 23.2736C17.2845 23.5365 16.9256 23.668 16.4709 23.668C16.009 23.668 15.6466 23.5365 15.3837 23.2736C15.1279 23.0036 15 22.6803 15 22.3037Z" fill="#C8191C"></path>
                                                </svg>
                                            </div>
                                            <div class="flex flex-col">
                                                <span class="leading-4 dm-sans font-medium lg:text-lg text-gray-12 lg:mb-1.5 mb-1 text-sm mt-2.5 ltr:lg:pr-0 ltr:pr-3 ltr:ml-2 rtl:lg:pl-0 rtl:pl-3 rtl:mr-2">Are you sure you want to delete this?</span>
                                                <p class="ltr:ml-2 ltr:lg:pr-0 ltr:pr-10 rtl:mr-2 rtl:lg:pl-0 rtl:pl-10 text-gray-10 roboto-medium font-medium lg:text-sm text-11 whitespace-pre-line">Please keep in mind that once deleted, you can not undo it.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex justify-end lg:mt-8 lg:mx-0 mx-2 mt-6 ltr:lg:mr-30p rtl:lg:ml-30p">
                                        <button class="dm-sans items-center transition duration-200 rounded px-3 lg:px-8 cursor-pointer font-medium lg:text-sm text-gray-12 lg:h-46p w-max h-10 bg-white border border-gray-2 text-xs hover:border-gray-12" @click="notific_dlt_modal = false"> Cancel
                                        </button>
                                        <form action="http://localhost/multivendor/user/review/delete/11" method="post">
                                            <input type="hidden" name="_token" value="BigOWW9pp1hG36mJ8s0NpyUEPGEpZiCuBFdQhXWV" autocomplete="off">                                                                <button type="submit" class="dm-sans ltr:ml-3 rtl:mr-3 transition duration-200 items-center cursor-pointer py-3.5 lg:px-6 font-medium lg:text-sm text-white lg:h-46p bg-gray-12 hover:bg-yellow-1 hover:text-gray-12 text-xs w-max px-3 h-10 rounded">Yes, Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" lg:mt-15p mt-2 cursor-pointer transition delay-150 text-gray-10 hover:text-gray-12 bg-white hover:bg-gray-11 border border-gray-2 rounded lg:px-30p px-3 lg:flex items-center justify-between ">
                <div class="flex">
                    <img class="lg:h-10 h-7 lg:w-10 w-7 lg:my-30p my-4" src="{{ asset('public/frontend/assets/img/notification/Group 601.png') }}" alt="{{ __('Image') }}" />
                    <p class="roboto-medium font-medium lg:text-base text-11 lg:py-10 py-4 lg:ml-5 ml-2.5 text-gray-10 hover:text-gray-12 "> {{ __("NEW UPDATE! Bookie’s Cookie House has opened their shop here and offering 50% discount for first 100 customers. What are you waiting for? Click here to visit.") }}</p>
                </div>
                <p class="roboto-medium font-medium lg:text-sm text-xss -mt-3 lg:mt-0 text-gray-10 lg:text-right text-left ml-38p lg:mb-0 mb-3.5"> {{ __("2 hours ago") }}</p>
            </div>
            <div class="mt-15p cursor-pointer transition delay-150 text-gray-10 hover:text-gray-12 bg-white hover:bg-gray-11 border border-gray-2 rounded lg:px-30p px-3 lg:flex items-center justify-between">
                <div class="flex">
                    <img class="lg:h-10 h-7 lg:w-10 w-7 lg:my-30p my-4" src="{{ asset('public/frontend/assets/img/notification/Group 606.png') }}" alt="{{ __('Image') }}" />
                    <p class="roboto-medium font-medium lg:text-base text-11 lg:py-10 py-4 lg:ml-5 ml-2.5 text-gray-10 hover:text-gray-12 "> {{ __("Gamik Wireless Gaming Headphone is now available in stock. Hurry up now!") }}</p>
                </div>
                <p class="roboto-medium font-medium text-gray-10 lg:text-sm text-xss -mt-3 lg:mt-0 lg:text-right text-left ml-38p lg:mb-0 mb-3.5"> 3:47 pm<br> 17 Feb, 2022
                </p>
            </div>
            <div class="mt-15p cursor-pointer transition delay-150 text-gray-10 hover:text-gray-12 bg-white hover:bg-gray-11 border border-gray-2 rounded lg:px-30p px-3 lg:flex items-center justify-between">
                <div class="flex">
                    <img class="lg:h-10 h-7 lg:w-10 w-7 lg:my-30p my-4" src="{{ asset('public/frontend/assets/img/notification/unsplash_9xnnEpX6HAA.png') }}" alt="{{ __('Image') }}" />
                    <p class="roboto-medium font-medium lg:text-base text-11 lg:py-10 py-4 lg:ml-5 ml-2.5 text-gray-10 hover:text-gray-12">{{ __("Kyle Harass Furnitures has replied to your message. Give a response.") }}</p>
                </div>
                <p class="roboto-medium font-medium text-gray-10 lg:text-sm text-xss -mt-3 lg:mt-0 lg:text-right text-left ml-38p lg:mb-0 mb-3.5 "> 17 Feb, 2022 8:01 am</p>
            </div>
            <div class="mt-15p cursor-pointer transition delay-150 text-gray-10 hover:text-gray-12 bg-white hover:bg-gray-11 border border-gray-2 rounded lg:px-30p px-3 lg:flex items-center justify-between">
                <div class="flex">
                    <div class="rounded-full hidden lg:block bg-pinks-2 p-3 h-10 w-10 my-30p">
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="15" viewBox="0 0 17 15" fill="none">
                            <path d="M2.20266 8.38364L8.0021 13.8316C8.20187 14.0193 8.30175 14.1131 8.41952 14.1362C8.47256 14.1466 8.52711 14.1466 8.58015 14.1362C8.69792 14.1131 8.79781 14.0193 8.99758 13.8316L14.797 8.38364C16.4287 6.85082 16.6269 4.32839 15.2545 2.55958L14.9965 2.22699C13.3547 0.110979 10.0594 0.465849 8.90578 2.88288C8.74283 3.2243 8.25684 3.2243 8.09389 2.88288C6.94031 0.465849 3.64492 0.110982 2.00319 2.22699L1.74515 2.55958C0.372794 4.32839 0.570944 6.85082 2.20266 8.38364Z" fill="#C8191C" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.3376 2.73855C13.0764 1.11304 10.5449 1.38565 9.65874 3.2424C9.19362 4.21695 7.80639 4.21696 7.34126 3.2424C6.45508 1.38565 3.92357 1.11304 2.6624 2.73855L2.40435 3.07114C1.29574 4.50002 1.45581 6.53768 2.77394 7.77592L8.5 13.1549L14.2261 7.77592C15.5442 6.53768 15.7043 4.50002 14.5956 3.07114L14.3376 2.73855ZM8.5 1.9195C10.149 -0.500689 13.7792 -0.702625 15.6557 1.7159L15.9137 2.04849C17.5498 4.15724 17.3136 7.16443 15.3683 8.99184L9.56886 14.4398C9.56338 14.4449 9.55783 14.4502 9.55219 14.4555C9.46748 14.5351 9.36536 14.6311 9.26727 14.7067C9.15148 14.7959 8.97762 14.9085 8.74095 14.955L8.58032 14.1364L8.74095 14.955C8.58183 14.9862 8.41817 14.9862 8.25906 14.955L8.41969 14.1364L8.25905 14.955C8.02238 14.9085 7.84852 14.7959 7.73273 14.7067C7.63467 14.6312 7.53257 14.5352 7.44787 14.4555C7.44222 14.4502 7.43664 14.445 7.43115 14.4398L1.63171 8.99184C-0.313593 7.16443 -0.549823 4.15724 1.08628 2.0485L1.34432 1.7159C3.22076 -0.702621 6.85097 -0.50069 8.5 1.9195Z" fill="#C8191C" />
                        </svg>
                    </div>
                    <div class="rounded-full lg:hidden block my-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                            <circle cx="14" cy="14" r="14" fill="#F9E8E8"/>
                            <path d="M9.94196 14.9693L14.0016 18.7829C14.1414 18.9143 14.2113 18.9799 14.2938 18.9961C14.3309 19.0034 14.3691 19.0034 14.4062 18.9961C14.4886 18.9799 14.5586 18.9143 14.6984 18.7829L18.758 14.9693C19.9002 13.8964 20.0389 12.1307 19.0783 10.8925L18.8976 10.6597C17.7484 9.17847 15.4417 9.42688 14.6341 11.1188C14.5201 11.3578 14.1799 11.3578 14.0658 11.1188C13.2583 9.42688 10.9515 9.17847 9.80233 10.6597L9.6217 10.8925C8.66105 12.1307 8.79976 13.8964 9.94196 14.9693Z" fill="#C8191C"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M18.4362 11.0176C17.5534 9.87971 15.7813 10.0705 15.161 11.3703C14.8354 12.0525 13.8644 12.0525 13.5388 11.3703C12.9185 10.0705 11.1464 9.87971 10.2636 11.0176L10.083 11.2504C9.30692 12.2506 9.41897 13.677 10.3417 14.5437L14.3499 18.309L18.3581 14.5437C19.2808 13.677 19.3929 12.2506 18.6169 11.2504L18.4362 11.0176ZM14.3499 10.4442C15.5042 8.7501 18.0454 8.60875 19.3589 10.3017L19.5395 10.5345C20.6848 12.0107 20.5194 14.1157 19.1577 15.3949L15.0981 19.2084C15.0943 19.212 15.0904 19.2157 15.0864 19.2194C15.0271 19.2752 14.9557 19.3424 14.887 19.3953C14.8059 19.4577 14.6842 19.5365 14.5186 19.5691L14.4061 18.9961L14.5186 19.5691C14.4072 19.5909 14.2926 19.5909 14.1812 19.5691L14.2937 18.9961L14.1812 19.5691C14.0156 19.5365 13.8939 19.4577 13.8128 19.3953C13.7442 19.3424 13.6727 19.2752 13.6134 19.2194C13.6095 19.2157 13.6056 19.2121 13.6017 19.2084L9.5421 15.3949C8.18039 14.1157 8.01503 12.0107 9.1603 10.5345L9.34093 10.3017C10.6544 8.60875 13.1956 8.7501 14.3499 10.4442Z" fill="#C8191C"/>
                            </svg>
                    </div>
                    <p class="roboto-medium font-medium lg:text-base text-11 lg:py-10 py-4 lg:ml-5 ml-2.5 text-gray-10 hover:text-gray-12">{{ __("Zen V Polo T-Shirt has been added to your wishlist.") }}</p>
                </div>
                <p class="roboto-medium font-medium text-gray-10 lg:text-sm text-xss -mt-3 lg:mt-0 lg:text-right text-left ml-38p lg:mb-0 mb-3.5 "> 17 Feb, 2022 3:47 pm</p>
            </div>
            <div class=" mt-15p cursor-pointer transition delay-150 text-gray-10 hover:text-gray-12 bg-white hover:bg-gray-11 border border-gray-2 rounded lg:px-30p px-3 lg:flex items-center justify-between">
                <div class="flex">
                    <div class="rounded-full hidden lg:block bg-green-2 py-2.5 px-3 h-10 w-10 my-30p">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" viewBox="0 0 16 18" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.55566 4.44444C3.55566 1.98985 5.54551 0 8.00011 0C10.4547 0 12.4446 1.98985 12.4446 4.44444V5.33333C12.4446 5.82425 12.0466 6.22222 11.5557 6.22222C11.0647 6.22222 10.6668 5.82425 10.6668 5.33333V4.44444C10.6668 2.97169 9.47287 1.77778 8.00011 1.77778C6.52735 1.77778 5.33344 2.97169 5.33344 4.44444V5.33333C5.33344 5.82425 4.93547 6.22222 4.44455 6.22222C3.95363 6.22222 3.55566 5.82425 3.55566 5.33333V4.44444Z" fill="#009651" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.781049 5.22538C0 6.00643 0 7.26351 0 9.77767V10.6666C0 14.0188 0 15.6949 1.0414 16.7363C2.0828 17.7777 3.7589 17.7777 7.11111 17.7777H8.88889C12.2411 17.7777 13.9172 17.7777 14.9586 16.7363C16 15.6949 16 14.0188 16 10.6666V9.77767C16 7.26351 16 6.00643 15.219 5.22538C14.4379 4.44434 13.1808 4.44434 10.6667 4.44434H5.33333C2.81918 4.44434 1.5621 4.44434 0.781049 5.22538ZM8 11.5554C8.49092 11.5554 8.88889 11.1575 8.88889 10.6666C8.88889 10.1756 8.49092 9.77767 8 9.77767C7.50908 9.77767 7.11111 10.1756 7.11111 10.6666C7.11111 11.1575 7.50908 11.5554 8 11.5554ZM10.6667 10.6666C10.6667 11.8276 9.92461 12.8154 8.88889 13.1815V15.111H7.11111V13.1815C6.07538 12.8154 5.33333 11.8276 5.33333 10.6666C5.33333 9.1938 6.52724 7.99989 8 7.99989C9.47276 7.99989 10.6667 9.1938 10.6667 10.6666Z" fill="#009651" />
                        </svg>
                    </div>
                    <div class="rounded-full lg:hidden block my-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 28 28" fill="none">
                        <circle cx="14" cy="14" r="14" fill="#EBF9F1"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M10.8887 10.8113C10.8887 9.09309 12.2816 7.7002 13.9998 7.7002C15.718 7.7002 17.1109 9.09309 17.1109 10.8113V11.4335C17.1109 11.7772 16.8323 12.0558 16.4887 12.0558C16.145 12.0558 15.8664 11.7772 15.8664 11.4335V10.8113C15.8664 9.78038 15.0307 8.94464 13.9998 8.94464C12.9689 8.94464 12.1331 9.78038 12.1331 10.8113V11.4335C12.1331 11.7772 11.8545 12.0558 11.5109 12.0558C11.1673 12.0558 10.8887 11.7772 10.8887 11.4335V10.8113Z" fill="#009651"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.94664 11.3583C8.3999 11.905 8.3999 12.7849 8.3999 14.5449V15.1671C8.3999 17.5136 8.3999 18.6869 9.12888 19.4159C9.85786 20.1449 11.0311 20.1449 13.3777 20.1449H14.6221C16.9687 20.1449 18.1419 20.1449 18.8709 19.4159C19.5999 18.6869 19.5999 17.5136 19.5999 15.1671V14.5449C19.5999 12.7849 19.5999 11.905 19.0532 11.3583C18.5064 10.8115 17.6265 10.8115 15.8666 10.8115H12.1332C10.3733 10.8115 9.49337 10.8115 8.94664 11.3583ZM13.9999 15.7893C14.3435 15.7893 14.6221 15.5107 14.6221 15.1671C14.6221 14.8234 14.3435 14.5449 13.9999 14.5449C13.6563 14.5449 13.3777 14.8234 13.3777 15.1671C13.3777 15.5107 13.6563 15.7893 13.9999 15.7893ZM15.8666 15.1671C15.8666 15.9798 15.3471 16.6713 14.6221 16.9275V18.2782H13.3777V16.9275C12.6527 16.6713 12.1332 15.9798 12.1332 15.1671C12.1332 14.1361 12.969 13.3004 13.9999 13.3004C15.0308 13.3004 15.8666 14.1361 15.8666 15.1671Z" fill="#009651"/>
                        </svg>
                    </div>
                    <p class="roboto-medium font-medium lg:text-base text-11 lg:py-10 py-4 lg:ml-5 ml-2.5 text-gray-10 hover:text-gray-12">{{ __("Your password has been successfully changed.") }}</p>
                </div>
                <p class="roboto-medium font-medium text-gray-10 lg:text-sm text-xss -mt-3 lg:mt-0 lg:text-right text-left ml-38p lg:mb-0 mb-3.5 "> 2 Feb, 2022 5:40 pm</p>
            </div>
        </div>
        <div class="flex lg:justify-between justify-center">
            <div class="lg:block hidden">
                <a class="roboto-medium text-left font-medium text-base mt-30p text-gray-10">{{ __("Showing") }}
                    <span class="text-gray-12">6</span> out of <span class="text-gray-12">38</span></a>
            </div>
            <a class="flex cursor-pointer lg:justify-between justify-center">
                <span class="dm-sans font-medium lg:text-base text-xs text-gray-12">{{ __("See More") }}</span>
                <svg class="mt-7p hidden lg:block ml-2.5" xmlns="http://www.w3.org/2000/svg" width="13" height="7" viewBox="0 0 13 7"
                    fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.89383e-08 1.21895L1.37054 1.63436e-08L6.5 4.5621L11.6295 1.3868e-07L13 1.21895L6.5 7L6.89383e-08 1.21895Z" fill="#2C2C2C" />
                </svg>
                <svg class="mt-7p lg:hidden block ml-2.5" xmlns="http://www.w3.org/2000/svg" width="5" height="9" viewBox="0 0 13 7"
                    fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.89383e-08 1.21895L1.37054 1.63436e-08L6.5 4.5621L11.6295 1.3868e-07L13 1.21895L6.5 7L6.89383e-08 1.21895Z" fill="#2C2C2C" />
                </svg>
            </a>
        </div>
    </div>
@endsection
@section('js')
 <script src="{{ asset('/public/dist/js/custom/validation.min.js') }}"></script>
 <script>
    // it will be remove from here when notification will be dynamic, Please skip this
    $(document).ready(function() {
        $('.icon2').hide();

        $('.read-toggleButton').on('click',function() {
        var button = $(this);
        toggleIcons(button);
        });

        function toggleIcons(button) {
        var icon1 = button.closest('.read-toggleButton').find('.icon1');
        var icon2 = button.closest('.read-toggleButton').find('.icon2');

        icon1.toggle();
        icon2.toggle();
        }
    });
 </script>
@endsection
