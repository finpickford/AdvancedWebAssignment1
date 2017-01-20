{{-- Create a file to deal with any flash messages which may need to be shown in the current session user. --}}

@if (session()->has('flash_message')) {{-- Check the current session, if it contains a flash message, run the following. --}}
  <div class="alert alert{{ ucwords(session('flash_message_level')) }}"> {{-- Set the div class equal to what the current flash message level is, e.g. Success/Error. --}}
  {{ session('flash_message') }} {{-- Get the current flash message. --}}
</div>
@endif
