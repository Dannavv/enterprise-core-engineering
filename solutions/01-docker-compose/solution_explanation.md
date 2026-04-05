# Lab 01 Solution Explanation: Multi-Container Architecture 🐳

This solution demonstrates how to separate the **Presentation Layer** (Web Server) from the **Data Layer** (Database) using Docker Compose.

---

## 🛠️ The Architecture
In this lab, we created two independent services that work together as a team:

### 1. The Web Service (`php:8.2-apache`)
-   **Role**: The "Brain" of the application. It receives requests, processes PHP code, and generates HTML.
-   **Port Mapping**: We mapped host port `8081` to container port `80`. This makes the application accessible at `http://localhost:8081`.
-   **Volume Mounting**: By mounting `./:/var/www/html`, we link our local source files directly into the container. Any changes you make to `index.php` are reflected instantly without needing to restart the server.

### 2. The Database Service (`mysql:8.0`)
-   **Role**: The "Memory" of our system. It stores all ERP data (students, grades, attendance).
-   **Security**: We used environment variables (`MYSQL_ROOT_PASSWORD`) to set the initial credentials. 
-   **Isolated Networking**: Notice that the `db` service does **not** expose any ports to the host machine. This is a critical security pattern: only the `web` container can talk to the database over the internal Docker network.

---

## 🚀 Running the Solution
To start the environment, navigate to this folder and run:
```bash
docker-compose up -d
```

Once started, open [http://localhost:8081](http://localhost:8081) in your browser. You should see a success message indicating that your multi-container environment is live.

---

## ✅ Key Concepts Mastered
-   **Separation of Concerns**: Keeping logic and data in different specialized environments.
-   **Infrastructure as Code (IaC)**: Defining your entire server setup in a single, shareable YAML file.
-   **Container Inter-connectivity**: Understanding how services talk to each other without exposing sensitive data to the public.

---
🚀 **[Back to Roadmap](../../README.md)** | 📚 **[View Lab Instructions](../../labs/01-docker-compose.md)**
