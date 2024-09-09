<!DOCTYPE html>
<html>
<head>
  <title>Mailbox</title>
  <style>
    body {
      font-family: sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f0f0f0;
    }
    .container {
      display: flex;
      height: 100vh;
    }
    .sidebar {
      background-color: #fff;
      width: 250px;
      padding: 20px;
      border-right: 1px solid #ddd;
    }
    .sidebar h2 {
      margin-top: 0;
    }
    .sidebar ul {
      list-style: none;
      padding: 0;
    }
    .sidebar li {
      padding: 10px;
      border-bottom: 1px solid #ddd;
    }
    .sidebar li:last-child {
      border-bottom: none;
    }
    .sidebar a {
      text-decoration: none;
      color: #333;
    }
    .main {
      flex-grow: 1;
      padding: 20px;
    }
    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }
    .header h1 {
      margin: 0;
    }
    .header .user {
      display: flex;
      align-items: center;
    }
    .header .user img {
      width: 30px;
      height: 30px;
      border-radius: 50%;
      margin-right: 10px;
    }
    .inbox {
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
    }
    .inbox .message {
      display: flex;
      align-items: center;
      padding: 10px;
      border-bottom: 1px solid #ddd;
    }
    .inbox .message:last-child {
      border-bottom: none;
    }
    .inbox .message .sender {
      margin-right: 10px;
    }
    .inbox .message .subject {
      font-weight: bold;
    }
    .inbox .message .date {
      color: #999;
      margin-left: auto;
    }
    .pagination {
      display: flex;
      justify-content: center;
      margin-top: 20px;
    }
    .pagination button {
      background-color: #fff;
      border: 1px solid #ddd;
      padding: 5px 10px;
      margin: 0 5px;
      cursor: pointer;
    }
    .pagination button.active {
      background-color: #337ab7;
      color: #fff;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="sidebar">
      <h2>Folders</h2>
      <ul>
        <li><a href="#">Inbox <span class="badge">0</span></a></li>
        <li><a href="#">Sent <span class="badge">1</span></a></li>
        <li><a href="#">Drafts <span class="badge">0</span></a></li>
        <li><a href="#">Trash <span class="badge">0</span></a></li>
      </ul>
      <button>Compose</button>
    </div>
    <div class="main">
      <div class="header">
        <h1>Mailbox</h1>
        <div class="user">
          <img src="https://via.placeholder.com/30" alt="User avatar">
        </div>
      </div>
      <div class="inbox">
        <div class="message">
          <div class="sender">
            <span>STITOU MOHAMED</span>
          </div>
          <div class="subject">
            <span>MSG TEST1</span>
          </div>
          <div class="date">
            <span>2019/10/15 11:35:50</span>
          </div>
        </div>
      </div>
      <div class="pagination">
        <button class="active">1</button>
        <button>2</button>
        <button>3</button>
      </div>
    </div>
  </div>
</body>
</html>