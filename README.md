




## 📌 Phase 1: Laravel Setup

**Prompt 1: Install Laravel**

> "Give me the exact commands to install a new Laravel project named `blog-app` using Composer."

**Prompt 2: Configure Environment**

> "Guide me step by step on how to set up the `.env` file for my Laravel project, including database connection for MySQL."

**Prompt 3: Run Migrations**

> "Show me the commands to run Laravel migrations and explain what tables are created by default."

---

## 📌 Phase 2: Authentication (Breeze)

**Prompt 4: Install Breeze**

> "Give me the commands to install Laravel Breeze with Blade templates, and explain what files and routes it generates."

**Prompt 5: Authentication Workflow**

> "Explain how Laravel Breeze handles registration, login, logout, and forgot password, and where the code for these features lives."

---

## 📌 Phase 3: Blog CRUD (Model + Migration + Controller)

**Prompt 6: Create Blog Model and Migration**

> "Write a migration for a `posts` table with columns: id, user\_id, title, content, created\_at, updated\_at. Also generate the Post model with a relationship to the User model."

**Prompt 7: Create PostController**

> "Generate a PostController with resource methods (index, create, store, edit, update, destroy). Show me what each method should do."

**Prompt 8: Define Routes**

> "Write the resource routes for PostController inside `routes/web.php`, making sure create, store, edit, update, and destroy routes are protected by `auth` middleware."

---

## 📌 Phase 4: Views (Blade Templates)

**Prompt 9: List Blogs**

> "Create a Blade view for listing all posts with title, author name, and content. Guests should only see the list, logged-in users should also see edit and delete buttons."

**Prompt 10: Create Blog Form**

> "Write a Blade form for creating a new post with fields for title and content. The form should submit to the `store` route."

**Prompt 11: Edit Blog Form**

> "Write a Blade form for editing an existing post with pre-filled title and content."

---

## 📌 Phase 5: Access Control

**Prompt 12: Middleware Protection**

> "Explain how to use Laravel middleware to make sure only logged-in users can add, edit, or delete posts, but guests can view posts."

**Prompt 13: User Ownership**

> "Show me how to modify the PostController so that users can only edit and delete their own posts, not posts from other users."

---

## 📌 Phase 6: Forgot Password

**Prompt 14: Password Reset**

> "Explain how Laravel Breeze handles password reset and show me how to configure mail settings in `.env` to send reset links using Gmail SMTP."

---

## 📌 Phase 7: Polishing

**Prompt 15: Add Flash Messages**

> "Show me how to add Bootstrap alert messages for success and error when creating, editing, or deleting a post."

**Prompt 16: Add Layout**

> "Give me a simple Blade layout with a navbar that shows Login/Register when logged out, and Dashboard/Logout when logged in."

---

# 🎯 How You Use These Prompts

* Start with **Prompt 1** and move down step by step.
* Each time you paste a prompt to GPT/DeepSeek, it will give you code or commands.
* You copy that into your project and test.
* If you get stuck, you paste error logs back with:

  > "I got this error after running the code: \[paste error]. Help me fix it."

---

✅ This way you always know **what to ask next**, you won’t feel lost, and the project will grow step by step.

Do you want me to now **expand these prompts into a full checklist** (like a roadmap doc), so you can tick off completed steps and stay organized?
