# Enterprise Core Engineering 🚀
> **20 Hands-on Labs for Building Secure, Scalable, and Production-Ready Systems**

This repository is a comprehensive curriculum for developers looking to master the core architectural and security patterns used in enterprise-grade web applications (like ERP systems). 

Each lab is focused on a single, critical concept—ranging from infrastructure orchestration with Docker to advanced security hardening and database optimization.

---

## 🗺️ The Roadmap (20 Labs)

The curriculum is divided into four main pillars of engineering:

### 🏗️ Pillar 1: Infrastructure & Architecture
Foundation for scalable and maintainable environments.
- [01: Multi-Container Architecture (Docker)](labs/01-docker-compose.md) – Separating logic from data.
- [06: Modular Patterns](labs/06-modular-patterns.md) – Moving away from "Spaghetti Code" to clean modules.
- [07: Environment Management](labs/07-environment-vars.md) – Securing credentials with `.env`.
- [17: External Libraries (Composer)](labs/17-composer-libraries.md) – Leveraging the open-source ecosystem.
- [20: Modern Templating](labs/20-templating-logic.md) – Separating UI logic from backend code.

### 🛡️ Pillar 2: Security & Hardening
Protecting users and data from the most common web attacks.
- [02: Database Access Control](labs/02-database-security.md) – Implementing the Principle of Least Privilege.
- [03: Secure Session Management](labs/03-secure-sessions.md) – Preventing Session Hijacking and Fixation.
- [04: Query Gateways (SQLi Defense)](labs/04-query-gateways.md) – Mastering Prepared Statements.
- [05: CSRF & Secure Headers](labs/05-csrf-and-headers.md) – Defending against cross-site request forgery.
- [12: Password Hashing](labs/12-password-hashing.md) – Implementing Argon2/Bcrypt best practices.
- [15: XSS Defense](labs/15-xss-defense.md) – Sanitizing outputs and escaping data.

### 💾 Pillar 3: Data Integrity & Optimization
Ensuring the "Source of Truth" is fast, safe, and reliable.
- [09: Deep Input Validation](labs/09-input-validation.md) – Stopping bad data at the door.
- [13: Atomic Transactions](labs/13-atomic-transactions.md) – Ensuring "All-or-Nothing" operations.
- [16: SQL Optimization](labs/16-sql-optimization.md) – Using Indexes and `EXPLAIN` to scale.
- [19: Disaster Recovery](labs/19-sql-backups.md) – Automated backups and data restores.

### ⚡ Pillar 4: Stability & Observability
Building systems that are easy to debug and verify.
- [08: Forensic Logging](labs/08-forensic-logging.md) – Building an audit trail of user actions.
- [10: AJAX & JSON Pipelines](labs/10-ajax-json.md) – Building secure, modern communication flows.
- [11: Secure File Uploads](labs/11-secure-uploads.md) – Handling user assets safely.
- [14: Rate Limiting](labs/14-rate-limiting.md) – Defending against Brute Force attacks.
- [18: Automated Verification (TDD)](labs/18-unit-testing.md) – Systems that check their own logic.

---

## 🚀 How to use this Repository
1.  **Start at Lab 01**: Follow the labs in order for the best learning experience.
2.  **Read the Concept**: Each markdown file explains "The Why" behind the tech.
3.  **Complete the Task**: Implement the required feature in your local environment.
4.  **Discuss**: Use the discussion questions at the end of each lab to deepen your understanding.

## 🛠️ Tech Stack Used
-   **Backend**: PHP 8.2+
-   **Database**: MySQL 8.0
-   **Orchestration**: Docker & Docker Compose
-   **Tooling**: Composer, Linux Shell

---
*Created by Arpit Anand*
