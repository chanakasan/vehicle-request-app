
var TodoItem = Backbone.Model.extend({});

//var TodoItem = Backbone.Model.extend({urlRoot: '/users'});

var todoItem = new TodoItem(
    { description: 'Pick up milk', status: 'incomplete', id: 1 }
);

todoItem.set({status: 'complete'});

todoItem.url = '/users';
todoItem.fetch();

var TodoView = Backbone.View.extend({
    render: function(){
        var html = '<h3>' + this.model.get('username') + '</h3>';
        $(this.el).html(html);
    }
});

var todoView = new TodoView({ model: todoItem });
todoView.render();

console.log(todoView.el);


