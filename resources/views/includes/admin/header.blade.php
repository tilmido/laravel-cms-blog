<header>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li {{ Request::is("admin")? "class=active":""  }} ><a href="{{ route('admin.index') }}">Dashboard</a></li>
                <li  {{ Request::is("admin/post*")? "class=active":"" ||Request::is("admin/posts")? "class=active":""  }} ><a href="{{ route('admin.posts')}}">Posts</a></li>
                <li {{ Request::is("admin/categories")? "class=active":""  }}><a href="{{ route('admin.categories')}}">Categories</a></li>
                <li {{ Request::is("admin/messages")? "class=active":"" }} > <a href="{{ route('admin.messages')}}">Message</a></li>
                <li > <a href="{{ route('admin.logout')}}">Log out</a></li>

            </ul>
        </div>
    </nav>
</header>
@include('includes.infos')