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
            <div class="card border-primary">
                <div class="card-header">{{ $thread->message }}
                    <!-- voting forms begins -->
<!--                     <form role="form" method="POST" action="{{ url('/threads/' . $thread->id) }}">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <input type="hidden" name="increment" value="aggree">
                        <button type="submit" class="btn btn-secondary btn-sm">+</button>
                    </form>
                    <form role="form" method="POST" action="{{ url('/threads/' . $thread->id) }}">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <input type="hidden" name="increment" value="aggree">
                        <button type="submit" class="btn btn-secondary btn-sm">-</button>
                    </form> -->
                    <!-- voting forms end -->
                </div> <!-- who lies more? -->
                <div class="card-body">
        @if (count($thread->replies) > 0)
                    <div class="row">
            @foreach ($thread->replies as $reply)
                        <div class="col-sm">
                            <div class="card border-secondary">
                                <div class="card-header">{{ $reply->message }}</div> <!-- men -->
                                <div class="card-body">
                @if (count($reply->replies) > 0)
                    @foreach ($reply->replies as $reply2)
                                    <div class="card mt-2"> <!-- arguments 1 -->
                                        <div class="card-body">
                                            <p class="card-text">{{ $reply2->message }}</p>
                                        </div>
                                            <div class="card-footer">
                                                <div class="form-check form-check-inline">
<!--  -->
                                                    <form role="form" method="POST" action="{{ url('/threads/' . $reply2->id) }}">
                                                        {{ method_field('PUT') }}
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="increment" value="aggree">
                                                        <button type="submit" class="btn btn-secondary btn-sm">+  {{ $reply2->aggree }}</button>
                                                    </form>
                                                     &nbsp
                                                    <form role="form" method="POST" action="{{ url('/threads/' . $reply2->id) }}">
                                                        {{ method_field('PUT') }}
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="increment" value="disaggree">
                                                        <button type="submit" class="btn btn-secondary btn-sm">- {{ $reply2->disaggree }}</button>
                                                    </form>
                                                </div>
                                            </div>
                                        <!-- <div class="card-footer">Like, up, down, reply</div> -->
                                    </div>
                    @endforeach
                                    <!-- add argument -->
                                    <div class="card mt-2"> <!-- textbox -->
                                        <div class="card-body">
                                            <!-- argument form here -->
                                            <form role="form" method="POST" action="{{ url('/threads') }}">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="parent_id" value="{{ $reply->id }}">
                                                <input type="text" name="message">
                                                <button type="submit" class="btn btn-secondary btn-sm">Reply</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- add argument -->
                @else
                    No comments yet.

                                    <!-- add argument -->
                                    <div class="card mt-2"> <!-- textbox -->
                                        <div class="card-body">
                                            <!-- argument form here -->
                                            <form role="form" method="POST" action="{{ url('/threads') }}">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="parent_id" value="{{ $reply->id }}">
                                                <input type="text" name="message">
                                                <button type="submit" class="btn btn-secondary btn-sm">Reply</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- add argument -->
                @endif                    
                                </div>
                                <div class="card-footer">
                                    <div class="form-check form-check-inline">
    <!--  -->
                                        <form role="form" method="POST" action="{{ url('/threads/' . $reply->id) }}">
                                            {{ method_field('PUT') }}
                                            {{ csrf_field() }}
                                            <input type="hidden" name="increment" value="aggree">
                                            <button type="submit" class="btn btn-secondary btn-sm">+  {{ $reply->aggree }}</button>
                                        </form>
                                         &nbsp
                                        <form role="form" method="POST" action="{{ url('/threads/' . $reply->id) }}">
                                            {{ method_field('PUT') }}
                                            {{ csrf_field() }}
                                            <input type="hidden" name="increment" value="disaggree">
                                            <button type="submit" class="btn btn-secondary btn-sm">- {{ $reply->disaggree }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
            @endforeach
                    </div>
                    <!-- add thread option -->
                                    <div class="card mt-2"> <!-- textbox -->
                                        <div class="card-body">
                                            <!-- argument form here -->
                                            <form role="form" method="POST" action="{{ url('/threads') }}">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="parent_id" value="{{ $thread->id }}">
                                                <input type="text" name="message">
                                                <button type="submit" class="btn btn-secondary btn-sm">Reply</button>
                                            </form>
                                        </div>
                                        <!-- <div class="card-footer">Like, up, down, reply</div> -->
                                    </div>
                    <!-- add thread option -->
        @else
            No comments yet.
                    <!-- add thread option -->
                                    <div class="card mt-2"> <!-- textbox -->
                                        <div class="card-body">
                                            <!-- argument form here -->
                                            <form role="form" method="POST" action="{{ url('/threads') }}">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="parent_id" value="{{ $thread->id }}">
                                                <input type="text" name="message">
                                                <button type="submit" class="btn btn-secondary btn-sm">Reply</button>
                                            </form>
                                        </div>
                                        <!-- <div class="card-footer">Like, up, down, reply</div> -->
                                    </div>
                    <!-- add thread option -->
        @endif
                </div>
                <div class="card-footer">
                    <div class="form-check form-check-inline">
    <!--  -->
                        <form role="form" method="POST" action="{{ url('/threads/' . $thread->id) }}">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <input type="hidden" name="increment" value="aggree">
                            <button type="submit" class="btn btn-secondary btn-sm">+  {{ $thread->aggree }}</button>
                        </form>
                         &nbsp
                        <form role="form" method="POST" action="{{ url('/threads/' . $thread->id) }}">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <input type="hidden" name="increment" value="disaggree">
                            <button type="submit" class="btn btn-secondary btn-sm">- {{ $thread->disaggree }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@else
    <div class="row mt-3 justify-content-center">
        <div class="col-md-12">
            There is no threads yet.
        </div>
    </div>
@endif
    <!-- threads end-->
</div>
@endsection
