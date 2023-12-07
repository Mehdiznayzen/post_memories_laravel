<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        section{
            height: 100vh;
            display: flex;
            flex-direction : column;
            gap: 20px;
            align-items: center;
            justify-content: center;
            background: url('/annie-spratt-0ZPSX_mQ3xI-unsplash.jpg');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        form{
            display: grid;
            align-items: center;
            justify-content: center;
            gap: 15px;
            width: 300px;
            background-color: #fff;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 1px 1px 4px #000;
        }
        form h4{
            font-size: 20px;
            text-align: center;
        }
        form .input{
            padding: 8px;
            border: 1px solid #000;
            border-radius: 6px;
        }
        form .submit{
            background-color: blue;
            color : white;
            cursor : pointer;
        }
        form .reset{
            background-color: red;
            color : white;
            cursor : pointer;
        }
        section button{
            padding: 4px;
            cursor : pointer;
        }
        section a{
            text-align: center;
            text-decoration:none;
            color: #000
        }
    </style>
</head>
<body>
    <section class='bg-black'>
        <form action="/post_memorie" method="post" enctype="multipart/form-data">
            @csrf
            <h4>Creating a memory</h4>
            <input type="text" class='input' name="creator" placeholder='Creator' id="">
            <input type="text" class='input' name="title" placeholder='title' id="">
            <textarea name="message" class='input' placeholder='Message' id="" cols="30" rows="10"></textarea>
            <input type="text" class='input' name="tags" placeholder='tags' id="">
            <input type="file" name="image" id="">
            <input type="submit" class='submit input' name="" id="">
            <input type="reset" value='clear' class='reset input' name="" id="">
        </form>
        <button>
            <a href="show_memories">Show memories</a>
        </button>
    </section>
</body>
</html>

