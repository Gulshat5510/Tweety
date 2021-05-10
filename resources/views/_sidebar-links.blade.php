<ul>
    <li>
        <a href="{{ route('home') }}" class="font-bold text-lg mb-4 block">Home</a>
    </li>
    <li>
        <a href="/explore" class="font-bold text-lg mb-4 block">Explore</a>
    </li>
    @if(auth()->check())
     <li>
        <a href="{{ current_user()->path() }}" class="font-bold text-lg mb-4 block">Profile</a>
    </li>
    @endif
     <li>
         <form action="/logout" method="POST">
            @csrf
            <button class="font-bold text-lg">Logout</button>
        </form>
    </li>
</ul>