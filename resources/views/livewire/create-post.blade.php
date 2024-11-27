<div>

    <head>
        <title>Create a new Post</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>

    <body>
        <div class="card">
            <div class="card-header text-center font-weight-bold">
                Create a new Post HERE!
            </div>
            <div class="card-body">
                <form name="add-blog-post-form" id="add-blog-post-form" wire:submit="save">
                    <div class="form-group">
                        <label>title: </label>
                        <input class="form-control" type="text" wire:model="title" required />
                    </div>

                    <br />

                    <div class="form-group">
                        <label>content: </label>
                        <textarea class="form-control" wire:model="content" required></textarea>
                    </div>

                    <br />
                    <button class="btn btn-primary" type="submit" ">Save</button>
                </form>
            </div>
        </div>
    </body>
</div>