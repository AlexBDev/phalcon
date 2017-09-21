{% extends 'index.volt' %}

{% block body %}
    <ul class="list-unstyled" id="todo-list">
        {% for todo in todos %}
            {% if todo.isDone %}
                <li class="todo-delete">{{ todo.content }} <a href="{{ url(['for': 'todo_delete', 'id': todo.id]) }}"><i class="fa fa-times"></i></a></li>
            {% else %}
                <li class="todo-done">{{ todo.content }} <a href="{{ url(['for': 'todo_is_done', 'id': todo.id]) }}"><i class="fa fa-check"></i></a></li>
            {% endif %}
        {% endfor %}
    </ul>


    {{ form('/todo/create', 'method': 'post') }}
        <div class="form-group">
            <div class="col-sm-10">
                {{ form.render('content') }}
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                {{ submit_button('class': 'btn btn-success pull-right') }}
            </div>
        </div>
    {{ end_form() }}
{% endblock %}


