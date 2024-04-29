<div class="filter-box">
    <!-- Filters Heading -->
    <h2 class="filters-header">Filter Products</h2>
    <div class="accordion" id="filterAccordion">
        <!-- Categories Filter -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingCategory">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCategory" aria-expanded="true" aria-controls="collapseCategory">
                    Category
                </button>
            </h2>
            <div id="collapseCategory" class="accordion-collapse collapse show" aria-labelledby="headingCategory">
                <div class="accordion-body">
                    <form action="products.php" method="get" id="filterForm">
                        <?php foreach ($categories as $category): ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="category[]" id="category<?php echo $category['category_id']; ?>" value="<?php echo $category['category_id']; ?>" <?php echo (isset($_GET['category']) && in_array($category['category_id'], $_GET['category'] ?? [])) ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="category<?php echo $category['category_id']; ?>">
                                    <?php echo htmlspecialchars($category['category_name']); ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </form>
                </div>
            </div>
        </div>

        <!-- Brand Filter -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingBrand">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBrand" aria-expanded="false" aria-controls="collapseBrand">
                    Brand
                </button>
            </h2>
            <div id="collapseBrand" class="accordion-collapse collapse" aria-labelledby="headingBrand">
                <div class="accordion-body">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="brandOption1" name="brand[]" value="Option1">
                        <label class="form-check-label" for="brandOption1">Option 1</label>
                    </div>
                </div>

            </div>
        </div>

        <!-- Colour Filter -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingColour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseColour" aria-expanded="false" aria-controls="collapseColour">
                    Colour
                </button>
            </h2>
            <div id="collapseColour" class="accordion-collapse collapse" aria-labelledby="headingExample2">
                <div class="accordion-body">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="colourOption1" name="colour[]" value="Option1">
                        <label class="form-check-label" for="colourOption1">Option 1</label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Internal Storage Filter -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingStorage">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseStorage" aria-expanded="false" aria-controls="collapseStorage">
                    Internal Storage
                </button>
            </h2>
            <div id="collapseStorage" class="accordion-collapse collapse" aria-labelledby="headingStorage">
                <div class="accordion-body">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="storageOption1" name="storage[]" value="Option1">
                        <label class="form-check-label" for="storageOption1">Option 1</label>
                    </div>
                </div>
            </div>
        </div>

        <!-- Processor Filter -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingProcessor">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseProcessor" aria-expanded="false" aria-controls="collapseProcessor">
                    Processor
                </button>
            </h2>
            <div id="collapseProcessor" class="accordion-collapse collapse" aria-labelledby="headingExample2">
                <div class="accordion-body">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="processorOption1" name="processor[]" value="Option1">
                        <label class="form-check-label" for="processorOption1">Option 1</label>
                    </div>
                </div>
            </div>
        </div>
        <!-- Apply button at the bottom of the accordion -->
        <div class="p-3">
            <button type="button" class="btn btn-primary" onclick="resetFilters()">Reset Filters</button>
        </div>
    </div>
</div>