<script setup lang="ts"></script>

<template>
  <div class="px-4 py-3 border-t bg-gray-700 text-gray-500">
    <div
      class="flex flex-col justify-between text-xs sm:flex-row text-gray-600 dark:text-gray-400"
    >
      <span class="flex items-center font-semibold tracking-wide uppercase"
        >Showing 1-10 of 45</span
      >
      <div class="flex mt-2 sm:mt-auto sm:justify-end">
        <nav aria-label="Table navigation">
          <ul class="inline-flex items-center">
            <li>
              <button
                class="align-bottom inline-flex items-center justify-center leading-5 transition-colors duration-150 font-medium p-2 rounded-md text-gray-600 dark:text-gray-400 border border-transparent opacity-50 cursor-not-allowed"
                disabled
                type="button"
                aria-label="Previous"
              >
                <svg
                  class="h-3 w-3"
                  aria-hidden="true"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                >
                  <path
                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                    clip-rule="evenodd"
                    fill-rule="evenodd"
                  ></path>
                </svg>
              </button>
            </li>
            <li>
              <button
                class="align-bottom inline-flex items-center justify-center cursor-pointer leading-5 transition-colors duration-150 font-medium px-3 py-1 rounded-md text-xs text-white bg-purple-600 border border-transparent active:bg-purple-600 hover:bg-purple-700 focus:shadow-outline-purple"
                type="button"
              >
                1
              </button>
            </li>
            <li>
              <button
                class="align-bottom inline-flex items-center justify-center cursor-pointer leading-5 transition-colors duration-150 font-medium px-3 py-1 rounded-md text-xs text-gray-600 dark:text-gray-400 border border-transparent active:bg-transparent hover:bg-gray-100 focus:shadow-outline-gray dark:hover:bg-gray-500 dark:hover:text-gray-300 dark:hover:bg-opacity-10"
                type="button"
              >
                2
              </button>
            </li>
            <li>
              <button
                class="align-bottom inline-flex items-center justify-center cursor-pointer leading-5 transition-colors duration-150 font-medium px-3 py-1 rounded-md text-xs text-gray-600 dark:text-gray-400 border border-transparent active:bg-transparent hover:bg-gray-100 focus:shadow-outline-gray dark:hover:bg-gray-500 dark:hover:text-gray-300 dark:hover:bg-opacity-10"
                type="button"
              >
                3
              </button>
            </li>
            <li>
              <button
                class="align-bottom inline-flex items-center justify-center cursor-pointer leading-5 transition-colors duration-150 font-medium px-3 py-1 rounded-md text-xs text-gray-600 dark:text-gray-400 border border-transparent active:bg-transparent hover:bg-gray-100 focus:shadow-outline-gray dark:hover:bg-gray-500 dark:hover:text-gray-300 dark:hover:bg-opacity-10"
                type="button"
              >
                4
              </button>
            </li>
            <li>
              <button
                class="align-bottom inline-flex items-center justify-center cursor-pointer leading-5 transition-colors duration-150 font-medium px-3 py-1 rounded-md text-xs text-gray-600 dark:text-gray-400 border border-transparent active:bg-transparent hover:bg-gray-100 focus:shadow-outline-gray dark:hover:bg-gray-500 dark:hover:text-gray-300 dark:hover:bg-opacity-10"
                type="button"
              >
                5
              </button>
            </li>
            <li>
              <button
                class="align-bottom inline-flex items-center justify-center cursor-pointer leading-5 transition-colors duration-150 font-medium p-2 rounded-md text-gray-600 dark:text-gray-400 border border-transparent active:bg-transparent hover:bg-gray-100 focus:shadow-outline-gray dark:hover:bg-gray-500 dark:hover:text-gray-300 dark:hover:bg-opacity-10"
                type="button"
                aria-label="Next"
              >
                <svg
                  class="h-3 w-3"
                  aria-hidden="true"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                >
                  <path
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd"
                    fill-rule="evenodd"
                  ></path>
                </svg>
              </button>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</template>
