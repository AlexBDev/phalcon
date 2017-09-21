{% extends 'index.volt' %}

{% block body %}
    <div class="page-header text-center">
        <h2>This is a simple Todo application with the super fast Phalcon framework</h2>

        <a href="{{ url('todo') }}" style="margin-top: 20px;font-size: 1.5em;">Go make some todo</a>
    </div>
{% endblock %}
