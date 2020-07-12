@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
<!-- form begin -->
            <form role="form" method="POST" action="{{ url('/threads') }}">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col">
                        <textarea placeholder="Start a topic here..." id="message" class="form-control" style="font-size: 1.125rem" name="message" required autofocus rows="4"></textarea>
                    </div>
                </div>
                <div class="row mt-2 justify-content-end">
                    <div class="col-auto">
                        <!-- <div class="col-md-6 col-md-offset-6"> -->
                            <button type="submit" class="btn btn-primary">
                                Send
                            </button>
                        <!-- </div> -->
                    </div>
                </div>
            </form>
<!-- form end -->
        </div>
    </div>
    <!-- threads begin -->
@if (count($threads) > 0)
    @foreach ($threads as $thread)
    <div class="row mt-3 justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $thread->message }}</div> <!-- who lies more  -->
                <div class="card-body">
        @if (count($thread->replies) > 0)
            @foreach ($thread->replies as $reply)
                    <div class="row">
                        <div class="col-sm">
                            <div class="card">
                                <!-- <div class="card-header">{{ $reply->message }}</div> -->
                                <div class="card-body">
                                    <p class="card-text">{{ $reply->message }}</p>
                                </div>
                                <div class="card-footer">Like, up, down, reply</div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="card">
                                <div class="card-header">Women!</div>
                                <div class="card-body">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                </div>
                                <div class="card-footer">Like, up, down, reply</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">Like, up, down, reply</div>
            </div>
        </div>
    </div>
    <!-- threads end-->
    <!-- second thread begins -->
    <!-- threads begin -->
    <div class="row mt-3 justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Who lies more: men or women?
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm">
                            <div class="card">
                                <div class="card-header">Men!</div>
                                <div class="card-body">
                                    <p class="card-text">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                    </p>
                                </div>
                                <div class="card-footer">Like, up, down, reply</div>
                            </div>
                        </div>
                    <div class="col-sm">
                    <div class="card">
                        <div class="card-header">Women!</div>
                        <div class="card-body">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </div>
                        <div class="card-footer">Like, up, down, reply</div>

                    </div>
                </div>
                </div>
            </div>
            <div class="card-footer">Like, up, down, reply</div>
            </div>
        </div>
    </div>
    <!-- second thread ends -->
</div>
@endsection
