import random
import string
import os

init_sql_path = './init.sql'
# Function to generate a random username
def generate_username():
    first_names = ['John', 'Jane', 'Alex', 'Emily', 'Michael', 'Sarah', 'David', 'Laura']
    last_names = ['Smith', 'Doe', 'Johnson', 'Williams', 'Brown', 'Jones', 'Garcia', 'Miller']
    
    first_name = random.choice(first_names)
    last_name = random.choice(last_names)
    username = f"{first_name[0]}.{last_name.lower()}"
    
    return username

# Function to generate a random password
def generate_password(length=12):
    characters = string.ascii_letters + string.digits
    password = ''.join(random.choice(characters) for _ in range(length))
    return password

# Function to generate a random IBAN (for Germany as an example)
def generate_iban():
    country_code = random.choice(["NL"])
    check_digits = str(random.randint(10, 99))  # Random check digits
    bank_code = random.choice(["INGB", "ABNA", "ASNB", "RABO", "SNSB"])
    account_number = str(random.randint(10000000, 99999999)).zfill(10)  # 10-digit account number
    iban = f"{country_code}{check_digits} {bank_code} {account_number[:4]} {account_number[4:8]} {account_number[8:10]}"
    return iban

new_users = [{"username": generate_username(), "password": generate_password(), "bank_account": generate_iban()} for _ in range(15)]


def append_users_to_sql(users):
    with open(init_sql_path, 'a') as f:
        for user in users:
            # Create an INSERT statement for each user
            insert_statement = f"INSERT INTO users (username, password, bank_account) VALUES ('{user['username']}', '{user['password']}', '{user['bank_account']}');\n"
            f.write(insert_statement)


if __name__ == "__main__":
    append_users_to_sql(new_users)
    print(f"Added {len(new_users)} users to {init_sql_path}")
