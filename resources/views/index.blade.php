<html>

<head>
    <title>To-do List Application</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-offset-2">
                <div class="card mt-3" style="width: 100%;">
                    <div class="card-body">
                        <section id="data_section">
                            <div class="row">
                                <div class="col-sm-6 mt-3">
                                    <h4>List Of Todos</h4>
                                </div>

                                <div id="add_task_button_section" class="mb-3 col-sm-6">
                                    <button class="btn btn-primary mt-3" onClick="show_form('add_task');">Add New
                                        Todo<span><img src="{{ asset('images/task-button.png') }}" width="24px"
                                                onClick="show_form('add_task');" /></span></button>
                                </div>
                            </div>

                            <ul id="task_list" class="todo-list list-group list-group-flush">
                                @foreach ($todos as $todo)
                                    @if ($todo->status)
                                        <li id="{{ $todo->id }}" class="success list-group-item">
                                            <a href="#" class="toggle"></a>
                                            <span id="span_{{ $todo->id }}">{{ $todo->title }}</span><a
                                                href="#" onClick="delete_task('{{ $todo->id }}');"
                                                class="icon-delete">Delete</a>
                                            <a href="#"
                                                onClick="edit_task('{{ $todo->id }}','{{ $todo->title }}');"
                                                class="icon-edit">Edit</a>
                                        </li>
                                    @else
                                        <li id="{{ $todo->id }}" class="list-group-item"><a href="#"
                                                onClick="task_done('{{ $todo->id }}');" class="toggle"></a>
                                            <span id="span_{{ $todo->id }}">{{ $todo->title }}</span>
                                            <a href="#" onClick="delete_task('{{ $todo->id }}');"
                                                class="icon-delete">Delete</a>
                                            <a href="#"
                                                onClick="edit_task('{{ $todo->id }}','{{ $todo->title }}');"
                                                class="icon-edit">Edit</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </section>
                        <section id="form_section">
                            <form id="add_task" class="todo" style="display:none">
                                @csrf
                                <input id="task_title" type="text" name="title" placeholder="Enter a task name"
                                    value="" />
                                <button name="submit">Add Task</button>
                            </form>
                            <form id="edit_task" class="todo" style="display:none">
                                @csrf
                                <input id="edit_task_id" type="hidden" value="" />
                                <input id="edit_task_title" type="text" name="title" value="" />
                                <button name="submit">Edit Task</button>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="{{ asset('js/todo.js') }}" type="text/javascript"></script>
</body>

</html>










{{--

<a href="#" onClick="edit_task('{{$todo->id}}','{{$todo->title}}');"class="icon-edit">Edit</a></li>
            @endif
        @endforeach
        </ul>
        </section>
            <section id="form_section">
                <form id="add_task" class="todo" style="display:none">
                    <input id="task_title" type="text" name="title" placeholder="Enter a task name" value=""/>
                    <button name="submit">Add Task</button>
                </form>
                <form id="edit_task" class="todo" style="display:none">
                    <input id="edit_task_id" type="hidden" value="" />
                    <input id="edit_task_title" type="text" name="title" value="" />
                    <button name="submit">Edit Task</button>
                </form>
            </section>
        </div>
        <script src="http://code.jquery.com/jquery-latest.min.js"type="text/javascript"></script>
        <script src="assets/js/todo.js" type="text/javascript"></script>
        </body>
</html> 


--}}
