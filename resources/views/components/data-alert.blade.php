@if (session('estado'))
<div class="fixed bottom-0 left-0 mb-12 ml-5 w-full max-w-xs sm:max-w-md items-center rounded-lg bg-blue-100 px-4 py-4 text-base text-blue-900 border-t-8 border-2 border-blue-500" role="alert" data-te-alert-init data-te-alert-show style="z-index: 99999;">
  <input type="checkbox" class="hidden" id="footeralert">
  <div class="flex justify-start items-start">
    <p>{{ __(session('estado')) }}</p>
    <div>
      <button type="button"
              class="box-content rounded-none border-none p-1 text-blue-900 opacity-50 hover:text-blue-900 hover:no-underline hover:opacity-75 focus:opacity-100 focus:shadow-none focus:outline-none"
              data-te-alert-dismiss
              aria-label="Close">
        <span class="w-[1em] focus:opacity-100 disabled:pointer-events-none disabled:select-none disabled:opacity-25 [&.disabled]:pointer-events-none [&.disabled]:select-none [&.disabled]:opacity-25">
          <svg xmlns="http://www.w3.org/2000/svg"
               viewBox="0 0 24 24"
               fill="currentColor"
               class="h-6 w-6">
            <path fill-rule="evenodd"
                  d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z"
                  clip-rule="evenodd" />
          </svg>
        </span>
      </button>
    </div>
  </div>
</div>
@endif


@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {
    const { Alert, initTE } = require("tw-elements");
    initTE({ Alert });
});
</script>
@endpush