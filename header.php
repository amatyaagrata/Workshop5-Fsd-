<!DOCTYPE html>
<html>
<head>
    <title>Student Portfolio Manager</title>
    <style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        min-height: 100vh;
        font-family: "Poppins", Arial, sans-serif;
        background: linear-gradient(135deg, #e0c3fc, #8ec5fc);
        display: flex;
        flex-direction: column;
    }

    .card {
        width: 700px;
        max-width:95%;
        background: rgba(255, 255, 255, 0.95);
        margin: 70px auto;
        padding: 35px 40px;
        border-radius: 22px;
        box-shadow: 0 20px 45px rgba(0,0,0,0.15);
        animation: floatIn 0.6s ease;
    }

    @keyframes floatIn {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    h2 {
        font-size: 26px;
        text-align: center;
        color: #6a5acd;
        margin-bottom: 15px;
    }

    input, textarea {
        font-size: 26px;
        width: 100%;
        padding: 14px;
        margin-top: 12px;
        border-radius: 10px;
        border: 1px solid #ddd;
        transition: all 0.3s ease;
    }

    input:focus, textarea:focus {
        outline: none;
        border-color: #8a7cfb;
        box-shadow: 0 0 0 3px rgba(138,124,251,0.2);
    }

    textarea {
        resize: none;
        height: 80px;
    }

    button {
        width: 100%;
        padding: 14px;
        margin-top: 18px;
        border-radius: 12px;
        border: none;
        background: linear-gradient(135deg, #8a7cfb, #6a5acd);
        color: white;
        font-size: 17px;
        cursor: pointer;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    button:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(106,90,205,0.4);
    }

    a {
        display: block;
        margin-top: 12px;
        text-align: center;
        text-decoration: none;
        font-weight: 500;
        color: #6a5acd;
        transition: color 0.2s ease;
    }

    a:hover {
        color: #4b3fcf;
    }

    .success {
        margin-top: 12px;
        padding: 12px;
        border-radius: 10px;
        background: #e9fff1;
        color: #147a3d;
        text-align: center;
        font-weight: 500;
        animation: pop 0.4s ease;
    }

    .error {
        margin-top: 12px;
        padding: 12px;
        border-radius: 10px;
        background: #ffecec;
        color: #b40000;
        text-align: center;
        font-weight: 500;
        animation: pop 0.4s ease;
    }

    @keyframes pop {
        from {
            transform: scale(0.9);
            opacity: 0;
        }
        to {
            transform: scale(1);
            opacity: 1;
        }
    }

    .footer {
        margin-top: auto;
        text-align: center;
        padding: 15px;
        font-size: 14px;
        color: #444;
    }
</style>
</head>
<body>