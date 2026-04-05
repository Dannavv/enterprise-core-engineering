# Lab 16: High-Performance Queries (Indexes & EXPLAIN)
**Objective**: Build a database that is "Fast" even with 100,000 students.

## 💡 The Concept
1.  **Full-Table Scan**: If you search for a student's name in a table with 10,000 students, but you don't have an "Index," MySQL must read every single row until it finds the right one.
2.  **Indexing**: A "Tome" (Index) for your table. It lets the database look up the location of a row in milliseconds.
3.  **Optimization**: Use `EXPLAIN SELECT ...` to see how MySQL searches for your row.

## 🛠 The Task
Create a performance test on a mock-up database:
1.  **Step 1**: Create a `students` table with `id`, `roll_no`, and `name`.
2.  **Step 2**: Use a script to insert **1,000 mock students** (a loop will do).
3.  **Step 3**: Use `EXPLAIN SELECT * FROM students WHERE roll_no = '2201AI01';` in the database. Look at the `type` column—it should say `ALL` (Table Scan).
4.  **Step 4**: Add an index: `CREATE INDEX idx_roll ON students(roll_no);`.
5.  **Step 5**: **The Test**: Run the `EXPLAIN` again. It should now say `ref` or `const`!

## 🔍 Discussion Questions
- If an index makes `SELECT` fast, does it make `INSERT` faster or slower? Explain.
- Why is it a bad idea to add an index on EVERY column in your database?
- How does an index "Work" internally? Does it use a list or a tree-like structure? 
