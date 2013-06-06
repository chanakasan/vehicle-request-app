(function ($) {

//    var contacts = [
//        { username: "Contact 1", address: "1, a street, a town, a city, AB12 3CD", tel: "0123456789", email: "anemail@me.com", type: "family" },
//        { username: "Contact 2", address: "1, a street, a town, a city, AB12 3CD", tel: "0123456789", email: "anemail@me.com", type: "family" },
//        { username: "Contact 3", address: "1, a street, a town, a city, AB12 3CD", tel: "0123456789", email: "anemail@me.com", type: "friend" },
//        { username: "Contact 4", address: "1, a street, a town, a city, AB12 3CD", tel: "0123456789", email: "anemail@me.com", type: "colleague" },
//        { username: "Contact 5", address: "1, a street, a town, a city, AB12 3CD", tel: "0123456789", email: "anemail@me.com", type: "family" },
//        { username: "Contact 6", address: "1, a street, a town, a city, AB12 3CD", tel: "0123456789", email: "anemail@me.com", type: "colleague" },
//        { username: "Contact 7", address: "1, a street, a town, a city, AB12 3CD", tel: "0123456789", email: "anemail@me.com", type: "friend" },
//        { username: "Contact 8", address: "1, a street, a town, a city, AB12 3CD", tel: "0123456789", email: "anemail@me.com", type: "family" }
//    ];

    $.getJSON('/app_dev.php/users', function(data) {
        var contacts = [];

        $.each(data, function(index) {
            //console.log( data[index]);
            contacts.push(data[index]);
        });
//        console.log(contacts);

        var Contact = Backbone.Model.extend({
            defaults: {
                photo: "/img/placeholder.png"
            }
        });

        var Directory = Backbone.Collection.extend({
            model: Contact,
            UrlRoot: "/app_dev.php/users"
        });


        var ContactView = Backbone.View.extend({
            tagName: "article",
            className: "contact-container",
            template: $("#contactTemplate").html(),

            render: function () {
                var tmpl = _.template(this.template);

                this.$el.html(tmpl(this.model.toJSON()));
                return this;
            }
        });

        var DirectoryView = Backbone.View.extend({
            el: $("#contacts"),

            initialize: function () {
                this.collection = new Directory(contacts);
                this.render();
            },

            render: function () {
                var that = this;
                _.each(this.collection.models, function (item) {
                    that.renderContact(item);
                }, this);
            },

            renderContact: function (item) {
                var contactView = new ContactView({
                    model: item
                });
                this.$el.append(contactView.render().el);
            }
        });

        var directory = new DirectoryView();
    });

} (jQuery));
