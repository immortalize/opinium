@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
<!-- create thread begin -->
                <div class="panel panel-default">
                <div class="panel-heading">Start a thread!</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/threads') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('thread_desc') ? ' has-error' : '' }}">
                            <label for="thread_desc" class="col-md-4 control-label">Message</label>

                            <div class="col-md-6">
                                <textarea id="message" class="form-control" name="message" required autofocus>{{ old('thread_desc') }}</textarea>

                                @if ($errors->has('thread_desc'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('thread_desc') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
<!-- create thread end -->
<style>
table, th, td {
  border: 1px solid;
  border-color: #d3e0e9;
  border-spacing: 5px;
  padding: 15px;
  border-collapse: collapse;
vertical-align: top;
}
</style>
<!-- Current Threads Begin -->
            @if (count($threads) > 0)
                @foreach ($threads as $thread)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{ $thread->message }}
                        </div>
                        <div class="panel-body">
                            @if (count($thread->replies) > 0)
                                <table style="width:100%; border:1px solid lightgray" >
                                    <tr>
                                    @foreach ($thread->replies as $reply)
                                        <td>
                                            {{ $reply->message }}
                                            <br>
                                            <br>
                                            &uarr; Ups, &darr; Downs, Author etc...
                                            <!-- second replies -->
                                            @if (count($reply->replies) > 0)
                                            <!-- #d3e0e9 -->
                                <table style="width:100%" >
                                    <tr>
                                    @foreach ($reply->replies as $reply2)
                                        <td>
                                            {{ $reply2->message }}
                                            <br>
                                            <br>
                                            &uarr; Ups, &darr; Downs, Author etc...
                                            <!-- second replies end -->
                                                                                    </td>
                                    @endforeach
                                    </tr>
                                </table>
                            @else
                                no comments yet.
                            @endif
                            <!-- second reply loops ended -->
            <!-- reply thread form -->
                            <br>
                            <div>
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/threads') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('thread_desc') ? ' has-error' : '' }}">
                            <!-- <label for="thread_desc" class="col-md-4 control-label">Message</label> -->
                            <input type="hidden" name="parent_id" value="{{ $reply->id }}">

                            <div class="col-md-6">
                                <!-- <textarea id="message" class="form-control" name="message" required autofocus>{{ old('thread_desc') }}</textarea> -->
                                <input type="text" name="message">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Reply
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            <!-- reply thread form end -->
                                        </td>
                                    @endforeach
                                    </tr>
                                </table>
                            @else
                                no comments yet.
                            @endif


                            <!-- reply form -->
                            <br>
                            <div>
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/threads') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('thread_desc') ? ' has-error' : '' }}">
                            <!-- <label for="thread_desc" class="col-md-4 control-label">Message</label> -->
                            <input type="hidden" name="parent_id" value="{{ $thread->id }}">

                            <div class="col-md-6">
                                <textarea id="message" class="form-control" name="message" required autofocus>{{ old('thread_desc') }}</textarea>
                                <!-- <input type="text" name="reply"> -->
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Reply
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                            <!-- reply form end -->
                        </div>        
                    </div>
                @endforeach
            @else
                There is no threads yet.
            @endif

            </div>
            </div>
        </div>
    </div>
@endsection
