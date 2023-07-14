<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link
            href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap"
            rel="stylesheet"
        />

        <!-- Styles -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
            crossorigin="anonymous"
        />
    </head>
    <body class="antialiased">
        <div class="w-50 mx-auto border p-3">
            <h2 class="w-100 text-center pb-5">generate shortner link</h2>
            <form
                method="post"
                action="{{ route('create.link') }}"
                class="d-flex justify-content-between"
            >
                @csrf
                <div class="w-100">
                    <label for="">link: </label>
                    <input class="w-50" type="text" name="link" />
                    @error('link')
                    <div class="text-dangerous">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">
                        generate
                    </button>
                </div>
            </form>
        </div>
        <!--  -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Shorte</th>
                    <th scope="col">Link</th>
                </tr>
            </thead>
            <tbody>
                @foreach($links as $key=>$link)
                <tr>
                    <th scope="row">1</th>
                    <td>{{ $key + 1 }}</td>
                    <td>
                        <a
                            target="_blank"
                            href="{{ route('shortener.link', $link->code) }}"
                            >{{ url("$link->code") }}</a
                        >
                    </td>
                    <td>{{$link->link}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!--  -->
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
