@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('message.newTask') }}
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Task Form -->

                    {!! Form::open(['route' => 'task.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
                        <!-- Task Name -->
                        <div class="form-group">
                        {!! Form::label('task-name', trans('message.task'), ['class' => 'col-sm-3 control-label']) !!}                            
                            <div class="col-sm-6">
                                {!! Form::text('name', old('task'), ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group" >
                            <div class="col-sm-offset-3 col-sm-6">
                                {!! Form::submit(trans('message.addTask'), ['class' => 'btn btn-default']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>

            <!-- Current Tasks -->
            @if (count($tasks) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('message.currentTask') }}
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>{{ trans('message.task') }}</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td class="table-text"><div>{{ $task->name }}</div></td>

                                        <!-- Task Delete Button -->
                                        <td>
                                            {!! Form::open(['route' =>['task.destroy', $task->id], 'method' => 'DELETE']) !!}
                        
                                                {!! Form::submit(trans('message.deleteBtn'), ['class' => 'btn btn-danger'] ) !!}
                        
                                            {!! Form::close() !!}

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
