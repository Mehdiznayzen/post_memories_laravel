<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        section{
            height: 100vh;
            display: flex;
            flex-direction: column;
            gap: 10px;
            background: url('/keith-misner-h0Vxgz5tyXA-unsplash.jpg');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            align-items: center;
        }
        section .container{
            width: 80%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin : 10px 0px;
            gap : 10px;
        }
        section .cards-container{
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap : 10px;
        }
        section .cards-container .card{
            width: 400px;
            display: flex;
            flex-direction:column;
            gap: 5px;
            background-color: #fff;
            justify-content: space-between;
            border-radius: 10px;
        }
        section .cards-container .card img{
            width : 100%;
            height: 200px;
            border-radius: 10px;
        }
        section .btn-container button{
            width: 130px;
            height: 30px;
            padding: 4px;
            cursor : pointer;
        }
        section .btn-container button a{
            text-align: center;
            text-decoration:none;
            color: #000;
        }
        section .title-page{
            display: flex;
            align-items: center;
            gap: 20px;
            background-color: #fff;
            width: 100%;
            justify-content: center;
            border-radius: 20px;
            padding: 5px;
        }
        section .title-page h1{
            font-size: 45px;
            color: rgb(68, 68, 248);
        }
        section .title-page img{
            width: 60px;
        }
        section .container .icons{
            display: flex;
            align-items: center;
            justify-content: center;
            color: blueviolet;
            margin: 7px;
        }
        section .container .card label{
            color: #ccc;
            font-size: 15px;
            margin: 7px;
        }
        section .container .card h2{
            color: #000;
            margin: 7px;
            font-size: 20px;
        }
        section .container .card .message p{
            color: #ccc;
            margin: 7px;
            font-size: 15px;
            width: 100%;
            text-align: center;
            margin: 4px 0px;
        }
        section .container .card .icons .delete button{
            display: flex;
            align-items: center;
            gap: 3px;
            padding: 4px;
            cursor: pointer;
        }
        section .container .msgs h3{
            font-size: 18px;
            font-weight: 600;
            color: #7B66FF;
        }

    </style>
</head>
<body>
    <section class='section'>
        <div class="container">
            <div class="title-page">
                <h1>Memories</h1>
                <img src="/memories.png" alt="">
            </div>
            <div class="cards-container">
                @foreach($data as $memorie)
                    <div class="card">
                        <div class="img-container">
                            <img src="{{ asset('uploads/memories/'.$memorie->image) }}" alt="">
                        </div>
                        <div class="tags">
                            <label>{{ $memorie['tags'] }}</label>
                        </div>
                        <div class="title">
                            <h2>{{ $memorie['title'] }}</h2>
                        </div>
                        <div class="message">
                            <p>{{ $memorie['message'] }}</p>
                        </div>
                        <div class="icons">
                            <form method='POST' action="/delete_memorie/{{ $memorie['id'] }}" class="delete">
                                @csrf
                                @method('DELETE')
                                <button type='submit'>
                                    <i class="fa-solid fa-trash"></i>
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="btn-container">
                <button>
                    <a href="/create_memories">Add new memorie</a>
                </button>
            </div>
            <div class="msgs">
                <h3>{{ session('remove_memorie') }}</h3>
                <h3>{{ session('add_memorie') }}</h3>
            </div>
        </div>
    </section>
</body>
</html>
