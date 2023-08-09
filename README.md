# php-orm-v.1
# Introduction
## 1. Object-Relational Mapping (ORM)

Doctrine is a widely used Object-Relational Mapping (ORM) library for PHP. It provides a powerful and flexible way to interact with relational databases using object-oriented principles. With Doctrine, developers can work with databases in a more intuitive and efficient manner, abstracting away much of the raw SQL code and allowing them to focus on their application's logic.

Doctrine ORM is widely used in PHP projects, from small applications to large-scale enterprise systems. It promotes best practices in database design, reduces repetitive database-related code, and helps developers work more efficiently with databases in PHP applications.
## 2. Entities in Doctrine ORM

In the context of Doctrine ORM, an "entity" refers to a PHP class that represents a specific object or concept within your application. These entities are used to model and interact with data in your database tables. Entities play a central role in bridging the gap between your object-oriented code and the relational database world.

Key points about entities:

- **Mapping:** Entities are typically mapped to database tables, which means that each instance of an entity class corresponds to a row in the associated table.

- **Properties:** The properties (also called attributes or fields) of an entity class represent the columns in the corresponding database table.

- **Relationships:** Entities can have relationships with other entities, defining how they are related to each other in the database. For example, entities can have one-to-one, one-to-many, or many-to-many relationships.

- **Annotations or Configuration:** You define the mapping between entity classes and database tables using annotations, YAML, or XML configuration. These mappings specify how properties, relationships, and other aspects of the entity are stored in the database.

- **Lifecycle:** Entities have a lifecycle that corresponds to their creation, modification, and deletion in both the PHP application and the database. Doctrine provides methods to manage these lifecycle events.

Entities are at the core of Doctrine ORM's functionality. They allow you to work with data in a more object-oriented manner while maintaining a connection to the relational database structure. By defining entities, you create a clear abstraction layer that simplifies database interactions and enables you to focus on the business logic of your application.
## 3. Basic RoadMap
### 1. Install Doctrine via Composer

Install Doctrine using Composer by running the following command in your project directory:

```bash
composer require doctrine/orm

{
    "require": {
        "doctrine/orm": "^2.11.0",
        "doctrine/dbal": "^3.2",
        "symfony/yaml": "^5.4",
        "symfony/cache": "^5.4"
    },
    "autoload": {
        "psr-0": {"": "src/"}
    }
}


composer install
```
### 2. Create Entity Classes

Define your entity classes in your project. These classes represent your data structures and will be mapped to database tables.
### 3. Configure Database Connection

Configure the database connection settings in your application. You can usually do this in a configuration file or by setting environment variables.
### 4. Create EntityManager

Create an instance of the EntityManager to interact with the database. Pass in the configuration and connection settings.
### 5. Generate Database Schema

Use Doctrine's command-line tool to generate the database schema based on your entity classes:

```bash
vendor/bin/doctrine orm:schema-tool:create
```
### 6. Perform CRUD Operations:

Use the EntityManager to perform Create, Read, Update, and Delete operations on your entities. Use object-oriented syntax.
### 7. Define Relationships

Define relationships between entities using annotations or configuration methods. This defines how data is stored and related in the database.
### 8. Handle Migrations (Optional)

If needed, use Doctrine's migration tools to manage database schema changes as your application evolves.
### 9. Implement Queries

Use Doctrine Query Language (DQL) to write queries for retrieving data from the database. DQL is similar to SQL but works with entities.
### 10. Handle Lifecycle Events

Hook into the lifecycle events of entities to implement specific behavior during various stages.

Always refer to the official Doctrine documentation for your specific version for detailed setup instructions, configuration options, and best practices.

# Getting Started
## 1. Entity Manager
### 1. Creating an EntityManager
To interact with the database using Doctrine ORM, you need to obtain an instance of the EntityManager. The EntityManager is the central class that manages entities and their interactions with the database.

1. **Set Up Doctrine Configuration:**  
Before obtaining the EntityManager, you need to set up the Doctrine configuration. This includes specifying the path to your entity classes and configuring database connection parameters. You'll typically do this in your application's bootstrap or configuration files.
```php
$entityPath = [__DIR__ . "/.."];
$config = ORMSetup::createAttributeMetadataConfiguration($entityPath, $isDevMode = true);
```

2. **Create EntityManager::**  
```php
$connectionParams = [
    'dbname'   => 'Estudo',
    'user'     => 'root',
    'password' => 'root',
    'host'     => 'db',
    'driver'   => 'pdo_mysql',
];

EntityManager::create($connectionParams, $config);
```
3.**Creating an Entity**
Entities in Doctrine ORM represent objects that are mapped to database tables. They allow you to interact with your database using object-oriented principles.

```php
<?php

declare(strict_types=1);

namespace Src\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

#[Entity]

    class Student 
    {
        #[Id]
        #[GeneratedValue]
        #[Column]

        public readonly int $id;

        public function __construct
        (
            #[Column]
            public readonly string $name
        )
        {

        }
    }
 ```
### 2. EntityManager Basic Methods
1. **`persist($entity)`**:
   This method starts tracking the entity for persistence.

2. **`remove($entity)`**:
   Schedules an entity for removal.

3. **`flush()`**:
   Synchronizes changes with the database.

4. **`find($entityName, $id)`**:
   Retrieves an entity by its primary key.

5. **`getRepository($entityName)`**:
   Returns a repository for querying entities.

6. **`createQuery($dql)`**:
   Creates a query object for DQL queries.

7. **`beginTransaction()`, `commit()`, `rollback()`**:
   Manages transactions manually.

8. **`clear($entityName = null)`**:
   Detaches entities from the `EntityManager`.

9. **`refresh($entity)`**:
   Refreshes an entity's state from the database.

10. **`getConnection()`**:
     Returns the associated database connection.

11. **`getUnitOfWork()`**:
     Returns the `UnitOfWork` instance.
### 3.Common Attributes in Doctrine ORM

Attributes are used in Doctrine ORM to define the mapping and behavior of entities. Here are some of the most common attributes:

- `@Entity`: Marks a class as an entity, representing a database table.
- `@Id`: Designates a property as the primary key of the entity.
- `@GeneratedValue`: Specifies automatic generation of primary key values.
- `@Column`: Maps a property to a database column, allowing customization of column properties.
- `@Table`: Specifies the name and attributes of the associated database table.
- `@OneToOne`: Defines a one-to-one relationship between entities.
- `@OneToMany`: Establishes a one-to-many relationship between entities.
- `@ManyToOne`: Creates a many-to-one relationship between entities.
- `@ManyToMany`: Establishes a many-to-many relationship between entities.
- `@JoinColumn`: Specifies a join column for relationships, enabling foreign key customization.
- `@JoinTable`: Defines a join table for many-to-many relationships.
- `@MappedSuperclass`: Marks a class as a mapped superclass for inheritance.
- `@InheritanceType`: Specifies the inheritance strategy for a class hierarchy.
- `@DiscriminatorColumn`: Defines the column for class inheritance (discriminator column).
- `@DiscriminatorMap`: Maps discriminator values to entity classes.
- `@Version`: Identifies a version field for optimistic locking.
- `@Cacheable`: Marks an entity as cacheable for second-level caching.
- `@EntityListeners`: Specifies listeners for entity lifecycle events.

## 2.Entity Repository
### getRepository()
Repositories in Doctrine ORM are classes responsible for querying and retrieving entities from the database. Each entity class has its own corresponding repository class that provides methods to interact with the database. Repositories abstract away the complexities of querying the database and provide a convenient API for fetching and managing entities.

```php
$studentRepository = $entityManager->getRepository(Entity::class);
 ```
### Basic Methods
### **1. find($id)**
Fetches an entity by its primary key.
```php
$product = $productRepository->find(1);
```
### **2. findOneBy(array $criteria)**
Fetches a single entity based on the provided criteria.
```php
$criteria = ['name' => 'iPhone'];
$product = $productRepository->findOneBy($criteria);
```
### **3.findBy(array criteria, array orderBy = null, limit = null, offset = null)**
Fetches multiple entities based on the provided criteria, ordering, limit, and offset.
```php
$criteria = ['category' => 'electronics'];
$orderBy = ['name' => 'ASC'];
$limit = 10;
$products = $productRepository->findBy($criteria, $orderBy, $limit);
```
### **4.findAll()**
Fetches all entities of the specified type.
```php
$products = $productRepository->findAll();
```
### 5. Custom Repository Methods
You can define custom repository methods to encapsulate complex queries or specific business logic. Custom methods should be defined in your repository class.
```php
// Custom method in ProductRepository
public function findProductsByCategory($category)
{
   return $this->createQueryBuilder('p')
       ->where('p.category = :category')
       ->setParameter('category', $category)
       ->getQuery()
       ->getResult();
}

// Usage
$category = 'electronics';
$products = $productRepository->findProductsByCategory($category);

```

## 3. Doctrine Basic Commands


Check the commands with:
 ```bash
 php bin/doctrine.php
 php vendor/bin/doctrine

 Example:
 php vendor/bin/doctrine orm:info

 Output:
  Found 1 mapped entities:

 [OK]   Src\Entity\Student
 ```
**orm:mapping:describe**
```bash
php bin/doctrine.php orm:mapping:describe Student

output:

 ------------------------------- ----------------------- 
  Field                           Value                  
 ------------------------------- ----------------------- 
  Name                            Src\Entity\Student     
  Root entity name                Src\Entity\Student     
  Custom generator definition     None                   
  Custom repository class         None                   
  Mapped super class?             False                  
  Embedded class?                 False                  
  Parent classes                  Empty                  
  Sub classes                     Empty                  
  Embedded classes                Empty                  
  Named queries                   Empty                  
  Named native queries            Empty                  
  SQL result set mappings         Empty                  
  Identifier                      [                      
                                      "id"               
                                  ]                      
  Inheritance type                1                      
  Discriminator column            None                   
  Discriminator value             None                   
  Discriminator map               Empty                  
  Generator type                  4                      
  Table                           {                      
                                      "name": "Student"  
                                  }                      
  Composite identifier?           False                  
  Foreign identifier?             False                  
  Enum identifier?                False                  
  Sequence generator definition   None                   
  Change tracking policy          1                      
  Versioned?                      False                  
  Version field                   None                   
  Read only?                      False                  
  Entity listeners                Empty                  
  Association mappings:                                  
  Field mappings:                                        
    id                                                   
      fieldName                   id                     
      type                        integer                
      scale                       Null                   
      length                      Null                   
      unique                      False                  
      nullable                    False                  
      precision                   Null                   
      id                          True                   
      columnName                  id                     
    name                                                 
      fieldName                   name                   
      type                        string                 
      scale                       Null                   
      length                      Null                   
      unique                      False                  
      nullable                    False                  
      precision                   Null                   
      columnName                  name                   
 ------------------------------- ----------------------- 

```

**orm:schema-tool:create**
Processes the schema and either create it directly on EntityManager Storage Connection or generate the SQL output

```bash
php bin/doctrine.php orm:schema-tool:create

Output:                                                                                                             
 [CAUTION] This operation should not be executed in a production environment!                                         
                                                                                                                      

 Creating database schema...

                                                                                                                        
 [OK] Database schema created successfully!                                            
 ```

**dbal:run-sql**
```bash
php bin/doctrine.php dbal:run-sql "SELECT * FROM Student"

                                                                                                                    
[OK] The query yielded an empty result set.                                                                                                                                                         
```
1. **doctrine:database:create**
   - *Description*: Creates the configured database for your application.
   - *Example*:
     ```sh
     php bin/console doctrine:database:create
     ```

2. **doctrine:schema:create**
   - *Description*: Creates the database schema based on your entity mappings.
   - *Example*:
     ```sh
     php bin/console doctrine:schema:create
     ```

3. **doctrine:schema:update**
   - *Description*: Updates the database schema based on your entity mappings.
   - *Example*:
     ```sh
     php bin/console doctrine:schema:update --force
     ```

4. **doctrine:schema:validate**
   - *Description*: Validates the mapping of your entities and the database schema.
   - *Example*:
```sh
php bin/console doctrine:schema:validate
 ```

5. **doctrine:fixtures:load**
   - *Description*: Loads data fixtures into the database.
   - *Example*:
```sh
php bin/console doctrine:fixtures:load
 ```

6. **doctrine:query:dql**
   - *Description*: Executes a DQL query.
   - *Example*:
```sh
php bin/console doctrine:query:dql "SELECT p FROM App\Entity\Product p"
 ```




# RelationShips
## 1. One-To-One, Unidirectional
In a unidirectional one-to-one relationship, one entity is associated with another entity through a single reference, but the referenced entity doesn't have a direct reference back.

```php
<?php
#[Entity]
class Product
{
    // ...

    /** One Product has One Shipment. */
    #[OneToOne(targetEntity: Shipment::class)]
    #[JoinColumn(name: 'shipment_id', referencedColumnName: 'id')]
    private Shipment|null $shipment = null;

    // ...
}

#[Entity]
class Shipment
{
    // ...
}
 ```

 ## 2. One-To-One, Bidirectional

 In a bidirectional one-to-one relationship, two entities reference each other, creating a two-way association.

 ```php
 <?php
#[Entity]
class Customer
{
    // ...

    /** One Customer has One Cart. */
    #[OneToOne(targetEntity: Cart::class, mappedBy: 'customer')]
    private Cart|null $cart = null;

    // ...
}

#[Entity]
class Cart
{
    // ...

    /** One Cart has One Customer. */
    #[OneToOne(targetEntity: Customer::class, inversedBy: 'cart')]
    #[JoinColumn(name: 'customer_id', referencedColumnName: 'id')]
    private Customer|null $customer = null;

    // ...
}
 ```
 ## 3. One-To-One, Self-referencing
In a self-referencing one-to-one relationship, an entity is related to itself.

```php

    <?php
    #[Entity]
    class Student
    {
        // ...

        /** One Student has One Mentor. */
        #[OneToOne(targetEntity: Student::class)]
        #[JoinColumn(name: 'mentor_id', referencedColumnName: 'id')]
        private Student|null $mentor = null;

        // ...
    }
 ```

 ### 4.One-To-Many, Bidirectional

In a One-To-Many bidirectional relationship, one entity is associated with multiple instances of another entity, and the associated entity has a direct reference back to the first entity.

```php
    <?php
use Doctrine\Common\Collections\ArrayCollection;

#[Entity]
class Product
{
    // ...
    /**
     * One product has many features. This is the inverse side.
     * @var Collection<int, Feature>
     */
    #[OneToMany(targetEntity: Feature::class, mappedBy: 'product')]
    private Collection $features;
    // ...

    public function __construct() {
        $this->features = new ArrayCollection();
    }
}

#[Entity]
class Feature
{
    // ...
    /** Many features have one product. This is the owning side. */
    #[ManyToOne(targetEntity: Product::class, inversedBy: 'features')]
    #[JoinColumn(name: 'product_id', referencedColumnName: 'id')]
    private Product|null $product = null;
    // ...
}
```
 ### 5.One-To-Many, Unidirectional with Join Table

In a One-To-Many unidirectional relationship with a join table, one entity is associated with multiple instances of another entity, and the relationship is maintained through an intermediate table.

```php
<?php
#[Entity]
class User
{
    // ...

    /**
     * Many Users have Many Phonenumbers.
     * @var Collection<int, Phonenumber>
     */
    #[JoinTable(name: 'users_phonenumbers')]
    #[JoinColumn(name: 'user_id', referencedColumnName: 'id')]
    #[InverseJoinColumn(name: 'phonenumber_id', referencedColumnName: 'id', unique: true)]
    #[ManyToMany(targetEntity: 'Phonenumber')]
    private Collection $phonenumbers;

    public function __construct()
    {
        $this->phonenumbers = new ArrayCollection();
    }

    // ...
}

#[Entity]
class Phonenumber
{
    // ...
}
 ```

 ### 6.One-To-Many, Self-referencing

In a One-To-Many self-referencing relationship, an entity can have multiple instances of the same entity type associated with it.

```php
<?php
    #[Entity]
    class Category
    {
        // ...
        /**
         * One Category has Many Categories.
         * @var Collection<int, Category>
         */
        #[OneToMany(targetEntity: Category::class, mappedBy: 'parent')]
        private Collection $children;

        /** Many Categories have One Category. */
        #[ManyToOne(targetEntity: Category::class, inversedBy: 'children')]
        #[JoinColumn(name: 'parent_id', referencedColumnName: 'id')]
        private Category|null $parent = null;
        // ...

        public function __construct() {
            $this->children = new ArrayCollection();
        }
    }
 ```
