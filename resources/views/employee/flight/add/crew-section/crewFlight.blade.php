<script>
    // add number of crew
    document.addEventListener('DOMContentLoaded', function() {
        var numOfCrew = document.querySelector('#num-of-crew');
        var submitOfCrew = document.querySelector('#submit-num-of-crew');
        var divInputsCrew = document.querySelector('#icontainer-inputs-crew');

        // Retrieve the saved number of crew from local storage, if it exists
        var savedNumberOfCrew = localStorage.getItem('numOfCrew');
        if (savedNumberOfCrew) {
            numOfCrew.value = savedNumberOfCrew;
            {{ $typeFlight }}(parseInt(savedNumberOfCrew));
        }

        submitOfCrew.addEventListener('click', function(event) {
            event.preventDefault();

            var numberOfCrew = parseInt(numOfCrew.value);

            if (isNaN(numberOfCrew) || numberOfCrew < 0) {
                alert('Please enter a valid number greater than 0.');
                return;
            }

            // Save the number of crew to local storage
            localStorage.setItem('numOfCrew', numberOfCrew);

            {{ $typeFlight }}(numberOfCrew);
        });

        // Add Inputs Crew MainFlight
        function mainFlight(numberOfCrew) {
            var htmlContent = '';
            for (let j = 1; j <= numberOfCrew; j++) {
                htmlContent += `
                <div class="block md:flex lg:flex xl:flex items-center mb-3 rounded-md border border-stroke py-5 px-2.5 shadow-1 dark:border-gray-600">
                    <div class="w-full me-2">
                        <label class="text-gray-700 dark:text-white block text-lg">الرقم المالي
                            <div class="flex items-center relative">
                                <input name="financial_number[]" type="number" placeholder="ادخل الرقم المالي للموظف"
                                    class="financial-number-${j} block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 dark:text-gray-300 form-input" />
                                <button type="button"
                                    class="submit-financial-num-${j} p-2 font-medium mt-1 text-sm leading-5 text-white transition duration-200 bg-blue-600 border border-transparent rounded-tl-lg rounded-bl-lg rounded-tr-sm rounded-br-sm active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue focus:ring-2 focus:ring-offset-2 focus:ring-custom-blue">
                                    إضافة
                                </button>
                            </div>
                        </label>
                        @error('financial_number')
                            <span class="text-xs text-red-600 dark:text-red-400 ms-3">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="grid w-full grid-cols-1 rounded-md border border-stroke shadow-1 dark:border-strokedark dark:bg-[#37404F]">
                        <div class="flex flex-col items-center justify-center">
                            <span class="w-full font-semibold text-black dark:text-white border-b border-stroke px-4 py-2 dark:border-strokedark"><i class="fa-solid fa-person-military-pointing text-blue-500"></i> <span class="ms-2 crew-name-${j}"> أدخل الرقم المالي  . . . </span> </span>
                            <span class="w-full font-semibold text-black dark:text-white px-4 py-2"><i class="fa-solid fa-arrow-left text-blue-500"></i> <span class="ms-2 crew-job-type-${j}"> </span> </span>

                        </div>
                    </div>
                </div>`;
            }

            if (divInputsCrew) {
                divInputsCrew.innerHTML = htmlContent;
            }
        }

        // Add Inputs Crew SubFlight
        function subFlight(numberOfCrew) {
            var htmlContent = '';
            for (let j = 1; j <= numberOfCrew; j++) {
                htmlContent += `
                <div class="rounded-md border border-stroke shadow-1 dark:border-gray-600 mb-3">
                    <div class="block md:flex lg:flex xl:flex items-center mb-1 py-5 px-2.5">
                        <div class="w-full me-2">
                            <label class="text-gray-700 dark:text-white block text-lg">الرقم المالي
                                <div class="flex items-center relative">
                                    <input name="financial_number[]" type="number" placeholder="ادخل الرقم المالي للموظف"
                                        class="financial-number-${j} block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 dark:text-gray-300 form-input" />
                                    <button type="button"
                                        class="submit-financial-num-${j} p-2 font-medium mt-1 text-sm leading-5 text-white transition duration-200 bg-blue-600 border border-transparent rounded-tl-lg rounded-bl-lg rounded-tr-sm rounded-br-sm active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue focus:ring-2 focus:ring-offset-2 focus:ring-custom-blue">
                                        إضافة
                                    </button>
                                </div>
                            </label>
                            @error('financial_number')
                                <span class="text-xs text-red-600 dark:text-red-400 ms-3">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="grid w-full grid-cols-1 rounded-md border border-stroke shadow-1 dark:border-strokedark dark:bg-[#37404F]">
                            <div class="flex flex-col items-center justify-center">
                                <span class="w-full font-semibold text-black dark:text-white border-b border-stroke px-4 py-2 dark:border-strokedark"><i class="fa-solid fa-person-military-pointing text-blue-500"></i> <span class="ms-2 crew-name-${j}"> أدخل الرقم المالي  . . . </span> </span>
                                <span class="w-full font-semibold text-black dark:text-white px-4 py-2"><i class="fa-solid fa-arrow-left text-blue-500"></i> <span class="ms-2 crew-job-type-${j}"> </span> </span>
                            </div>
                        </div>
                    </div>

                    <!-- trianing start-at , end-at -->
                    <div class="lg:flex xl:flex md:block items-center mb-5 px-2.5">

                        <div class="w-full lg:me-1">
                            <label class="text-gray-700 dark:text-white block text-lg"> بداية التدريب
                                <input name="training_start_at[]" type="time"
                                    {{--value="{{ old('training_start_at') }}"--}}
                                    placeholder="ادخل رقم تسجيل الطائرة "
                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                            </label>
                            @error('training_start_at')
                                <span class="text-xs text-red-600 dark:text-red-400 ms-3">
                                    {{-- {{ $message }} --}}
                                </span>
                            @enderror
                        </div>

                        <div class="w-full lg:ms-1 mt-3 lg:mt-0">
                            <div>
                                <label class="block text-xl">
                                    <span class="text-gray-700 dark:text-white block">نهاية التدريب</span>
                                    <input name="training_end_at[]" type="time"
                                        {{--value="{{ old('training_end_at') }}"--}}
                                        placeholder="ادخل رقم تسجيل الطائرة "
                                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                                </label>
                                @error('training_end_at')
                                    <span class="text-xs text-red-600 dark:text-red-400 ms-3">
                                        {{-- {{ $message }} --}}
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </div>

                </div>`;
            }

            if (divInputsCrew) {
                divInputsCrew.innerHTML = htmlContent;
            }
        }

    });
</script>
