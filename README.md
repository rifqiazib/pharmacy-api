# Pharmacy-API

Pharmacy API menyediakan untuk mengelola informasi terkait apotik. Dengan Pharmacy API, pengguna dapat dengan mudah mengakses, mengelola, dan memperbarui data obat dan kategori obat yang ada dalam sistem.
## API Reference
All endpoint need {bearer_token} 
except :
```http
  POST /api/register
```
```http
  POST /api/login
```

## Features

- Autentikasi Pengguna: Pengguna dapat melakukan login, logout, serta registrasi untuk mengakses API.
- Manajemen Obat: Menambahkan, memperbarui, menampilkan, dan menghapus data obat.
- Manajemen Kategori Obat: Menambah, memperbarui, menampilkan, dan menghapus kategori obat.


## Run Locally

Clone the project

```bash
  git clone https://github.com/rifqiazib/pharmacy-api.git
```

Go to the project directory

```bash
  cd my-project
```

Install dependencies

```bash
  composer install
```

Setup env File

```bash
  copy .env.example .env
```

Generate APP key

```bash
  php artisan key:generate
```

Generate JWT key

```bash
  php artisan jwt:secret
```

Start the server

```bash
  php artisan serve
```

#### Register

```http
  POST /api/register
```

| Request Body | Type     | Description|
| :-------- | :------- | :------------------------- |
| `name` | `string` | **Required**. user name|
| `email` | `string` | **Required**. email user unique |
| `password` | `string` | **Required**. user password |

#### Login

```http
  POST /api/login
```

| Request Body | Type     | Description|
| :-------- | :------- | :------------------------- |
| `email` | `string` | **Required**. email  |
| `password` | `string` | **Required**. password  |

#### Logout

```http
  POST /api/login
```

| Request Body | Type     | Description|
| :-------- | :------- | :------------------------- |
| `Authentication` | `bearer_token` | **Required**  |

#### Get medicine list

```http
  GET /api/medicine
```

| Request Body | Type     | Description|
| :-------- | :------- | :------------------------- |
| `Authentication` | `bearer_token` | **Required**  |

#### Get medicine by query

```http
  GET /api/medicine?parameter=
```

| Parameter | Type     | Description|
| :-------- | :------- | :------------------------- |
| `search` | `string` | search by name medicine  |
| `medicine_category` | `id` | search by medicine_category  |
| `medicine_type` | `string` | search by name medicine type  |

Medicine type have value : ['Tablet', 'Kapsul', 'Sirup', 'Salep']

#### Get medicine by id

```http
  GET /api/medicine/{id}
```

| Parameter | Type     | Description|
| :-------- | :------- | :------------------------- |
| `id` | `integer` | show by id medicine  |

Medicine type have value : ['Tablet', 'Kapsul', 'Sirup', 'Salep']

#### Create medicine

```http
  POST /api/medicine/
```

| Request Body | Type     | Description|
| :-------- | :------- | :------------------------- |
| `code` | `string` | **Required**. code is unique   |
| `medicine_category` | `integer` | **Required**   |
| `name` | `integer` | **Required**   |
| `description` | `integer` | nullable   |
| `type` | `string` | **Required**   |
| `expired_date` | `date` | **Required**   |
| `stock` | `integer` | **Required**   |
| `selling_price` | `integer` | **Required**   |

#### Update medicine

```http
  PUT /api/medicine/{id}
```
| Parameter | Type     | Description|
| :-------- | :------- | :------------------------- |
| `id` | `integer` | **Required**  |

| Request Body | Type     | Description|
| :-------- | :------- | :------------------------- |
| `code` | `string` | **Required**. code is unique   |
| `medicine_category` | `integer` | **Required**   |
| `name` | `integer` | **Required**   |
| `description` | `integer` | nullable   |
| `type` | `string` | **Required**   |
| `expired_date` | `date` | **Required**   |
| `stock` | `integer` | **Required**   |
| `selling_price` | `integer` | **Required**   |

#### Delete medicine

```http
  DELETE /api/medicine/{id}
```
| Parameter | Type     | Description|
| :-------- | :------- | :------------------------- |
| `id` | `integer` | **Required**  |

#### Get medicine category list

```http
  GET /api/medicine/category
```

| Request Body | Type     | Description|
| :-------- | :------- | :------------------------- |
| `Authentication` | `bearer_token` | **Required**  |

#### Get medicine by id

```http
  GET /api/medicine/category/{id}
```

| Parameter | Type     | Description|
| :-------- | :------- | :------------------------- |
| `id` | `integer` | show by id medicine  |


#### Create medicine category

```http
  POST /api/medicine/category/
```

| Request Body | Type     | Description|
| :-------- | :------- | :------------------------- |
| `code` | `string` | **Required**. code is unique   |
| `name` | `integer` | **Required**   |
| `description` | `integer` | nullable   |

#### Update medicine category

```http
  PUT /api/medicine/category/{id}
```
| Parameter | Type     | Description|
| :-------- | :------- | :------------------------- |
| `id` | `integer` | **Required**  |

| Request Body | Type     | Description|
| :-------- | :------- | :------------------------- |
| `code` | `string` | **Required**. code is unique   |
| `name` | `integer` | **Required**   |
| `description` | `integer` | nullable   |

#### Delete medicine category

```http
  DELETE /api/medicine/category/{id}
```
| Parameter | Type     | Description|
| :-------- | :------- | :------------------------- |
| `id` | `integer` | **Required**  |


## API Reference
All endpoint need {bearer_token} 
except :
```http
  POST /api/register
```
```http
  POST /api/login
```

#### Register

```http
  POST /api/register
```

| Request Body | Type     | Description|
| :-------- | :------- | :------------------------- |
| `name` | `string` | **Required**. user name|
| `email` | `string` | **Required**. email user unique |
| `password` | `string` | **Required**. user password |

#### Login

```http
  POST /api/login
```

| Request Body | Type     | Description|
| :-------- | :------- | :------------------------- |
| `email` | `string` | **Required**. email  |
| `password` | `string` | **Required**. password  |

#### Logout

```http
  POST /api/login
```

| Request Body | Type     | Description|
| :-------- | :------- | :------------------------- |
| `Authentication` | `bearer_token` | **Required**  |

#### Get medicine list

```http
  GET /api/medicine
```

| Request Body | Type     | Description|
| :-------- | :------- | :------------------------- |
| `Authentication` | `bearer_token` | **Required**  |

#### Get medicine by query

```http
  GET /api/medicine?parameter=
```

| Parameter | Type     | Description|
| :-------- | :------- | :------------------------- |
| `search` | `string` | search by name medicine  |
| `medicine_category` | `id` | search by medicine_category  |
| `medicine_type` | `string` | search by name medicine type  |

Medicine type have value : ['Tablet', 'Kapsul', 'Sirup', 'Salep']

#### Get medicine by id

```http
  GET /api/medicine/{id}
```

| Parameter | Type     | Description|
| :-------- | :------- | :------------------------- |
| `id` | `integer` | show by id medicine  |

Medicine type have value : ['Tablet', 'Kapsul', 'Sirup', 'Salep']

#### Create medicine

```http
  POST /api/medicine/
```

| Request Body | Type     | Description|
| :-------- | :------- | :------------------------- |
| `code` | `string` | **Required**. code is unique   |
| `medicine_category` | `integer` | **Required**   |
| `name` | `integer` | **Required**   |
| `description` | `integer` | nullable   |
| `type` | `string` | **Required**   |
| `expired_date` | `date` | **Required**   |
| `stock` | `integer` | **Required**   |
| `selling_price` | `integer` | **Required**   |

#### Update medicine

```http
  PUT /api/medicine/{id}
```
| Parameter | Type     | Description|
| :-------- | :------- | :------------------------- |
| `id` | `integer` | **Required**  |

| Request Body | Type     | Description|
| :-------- | :------- | :------------------------- |
| `code` | `string` | **Required**. code is unique   |
| `medicine_category` | `integer` | **Required**   |
| `name` | `integer` | **Required**   |
| `description` | `integer` | nullable   |
| `type` | `string` | **Required**   |
| `expired_date` | `date` | **Required**   |
| `stock` | `integer` | **Required**   |
| `selling_price` | `integer` | **Required**   |

#### Delete medicine

```http
  DELETE /api/medicine/{id}
```
| Parameter | Type     | Description|
| :-------- | :------- | :------------------------- |
| `id` | `integer` | **Required**  |

#### Get medicine category list

```http
  GET /api/medicine/category
```

| Request Body | Type     | Description|
| :-------- | :------- | :------------------------- |
| `Authentication` | `bearer_token` | **Required**  |

#### Get medicine by id

```http
  GET /api/medicine/category/{id}
```

| Parameter | Type     | Description|
| :-------- | :------- | :------------------------- |
| `id` | `integer` | show by id medicine  |


#### Create medicine category

```http
  POST /api/medicine/category/
```

| Request Body | Type     | Description|
| :-------- | :------- | :------------------------- |
| `code` | `string` | **Required**. code is unique   |
| `name` | `integer` | **Required**   |
| `description` | `integer` | nullable   |

#### Update medicine category

```http
  PUT /api/medicine/category/{id}
```
| Parameter | Type     | Description|
| :-------- | :------- | :------------------------- |
| `id` | `integer` | **Required**  |

| Request Body | Type     | Description|
| :-------- | :------- | :------------------------- |
| `code` | `string` | **Required**. code is unique   |
| `name` | `integer` | **Required**   |
| `description` | `integer` | nullable   |

#### Delete medicine category

```http
  DELETE /api/medicine/category/{id}
```
| Parameter | Type     | Description|
| :-------- | :------- | :------------------------- |
| `id` | `integer` | **Required**  |

