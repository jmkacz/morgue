<div class="row-fluid">
<div class="offset1 span10">

<?php if ($event['deleted']): ?>
    <div class="row-fluid">
        <div class="alert">
            <strong>Heads up!</strong> This postmortem was deleted.
        </div>
    </div>
<?php endif; ?>

<!-- Title -->
<div class="row-fluid">
    <input class="input-headline" id="eventtitle" type="text"
      value="<?php echo $event["title"] ?>">
</div>

<!-- Info Saved Notice -->
<div class="alert alert-success" style="opacity:0" id="saved_feedback">
Filler, to keep the same size
</div>

<!-- Small Print -->
<div class="row-fluid">
  <i class="muted"><small>All times are currently shown in <?php echo getUserTimezone() ?> time.</small></i>
</div>
<div class="row-fluid">
  <br/>
</div>

<!-- Time and Severity (in two columns) -->
<div class="row-fluid">
  <!-- Editable Controls -->
  <form class="form-horizontal">
  <div class="span6">
    <div class="control-group">
      <label class="control-label" id="event-start-time">Start time: </label>
      <div class="controls controls-row">
        <input id="event-start-input-date" name="event-start-input-date"
               class="input-small datepicker" type="text"
               value="<?php echo $start_datetime->format('m/d/Y'); ?>" >
        <input id="event-start-input-time" name="event-start-input-time"
                class="input-mini timeentry" type="text"
                value="<?php echo $start_datetime->format('g:iA'); ?>" >
      </div>
    </div>

    <div class="control-group">
      <label class="control-label" id="event-end-time">End time: </label>
      <div class="controls controls-row">
        <input id="event-end-input-date" name="event-end-input-date"
               class="input-small datepicker" type="text"
               value="<?php echo $end_datetime->format('m/d/Y'); ?>" >
        <input id="event-end-input-time" name="event-end-input-time"
               class="input-mini timeentry" type="text"
               value="<?php echo $end_datetime->format('g:iA'); ?>" >
      </div>
    </div>

    <div class="control-group">
      <label class="control-label" id="event-detect-time">Detect time: </label>
      <div class="controls controls-row">
        <input id="event-detect-input-date" name="event-detect-input-date"
               class="input-small datepicker" type="text"
               value="<?php echo $detect_datetime->format('m/d/Y'); ?>" >
        <input id="event-detect-input-time" name="event-detect-input-time"
               class="input-mini timeentry" type="text"
               value="<?php echo $detect_datetime->format('g:iA'); ?>" >
      </div>
    </div>

   <div class="control-group">
     <label class="control-label severity_levels" id="event-severity">Severity: </label>
       <div class="controls controls-row">
        <select id="severity-select" name="severity" class="input-small">
        <?php foreach (range(0, 5) as $a_severity) : ?>
          <option value="<?php echo $a_severity ?>"
            <?php if ($a_severity == $severity) { echo "selected=\"true\"";}?>>
            <?php echo $a_severity ?>
          </option>
        <?php endforeach ?>
        </select>
      </div>
    </div>
  </div>

  <!-- Calculated Controls -->
  <div class="span6">
    <div class="control-group">
      <label class="control-label"> Total impact time: </label>
      <div class="controls controls-row">
        <input class="input-medium" id="impacttime" type="text"
          value="<?php echo $impacttime; ?>"
          readonly=true/>
      </div>
    </div>

    <div class="control-group">
      <label class="control-label" id="time_undetected">Time undetected: </label>
      <div class="controls controls-row">
        <input class="input-medium" id="undetecttime" type="text"
          value="<?php echo $undetecttime; ?>"
          readonly=true/>
      </div>
   </div>

   <div class="control-group">
    <label class="control-label" id="resolve_time">Time to resolve: </label>
    <div class="controls controls-row">
      <input class="input-medium" id="resolvetime" type="text"
        value="<?php echo $resolvetime; ?>"
          readonly=true/>
    </div>
   </div>
  </div>
</form>
</div>

<?php

$config = Configuration::get_configuration();
foreach ($config['feature'] as $feature) {
    if ($feature['enabled'] == "on") {
        include $feature['name'] . '/views/' . $feature['name'] . '.php';
    }

    }
?>

<div class="row-fluid"><br/></div>

<!-- Delete -->
<div class="row-fluid">
  <?php if ($event['deleted']): ?>
    <legend>Restore</legend>
    <div id="undelete_button_container">
    <a class="btn btn-danger" href="/events/<?= $event['id'] ?>/undelete">Undelete this Postmortem</a>
    </div>
  <?php else: ?>
    <legend>Delete</legend>
    <div id="delete_button_container">
      <button class="btn btn-danger" id="delete-initial">Delete this Postmortem</button>
      <div id="delete_button_confirmation_container" style="display: none">
        Are you sure? <br/>
        <button class="btn" id="delete-no">No, please don't!</button>
        <button class="btn btn-danger" id="delete-yes">Yes, delete it forever</button>
       </div>
    </div>
  <?php endif; ?>
</div>

</div>
</div>



<script type="text/javascript" src="/assets/js/bootstrap.js"></script>
<script type="text/javascript" src="/assets/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="/assets/js/chosen.jquery.min.js"></script>
<script type="text/javascript" src="/assets/js/jquery.timeentry.min.js"></script>
<script type="text/javascript" src="/assets/js/api.js"></script>
<script type="text/javascript" src="/assets/js/images.js"></script>
<script type="text/javascript" src="/assets/js/jira.js"></script>
<script type="text/javascript" src="/assets/js/tags.js"></script>
<script type="text/javascript" src="/assets/js/irc.js"></script>
<script type="text/javascript" src="/assets/js/markdown.js"></script>
<script type="text/javascript" src="/assets/js/timehelpers.js"></script>
<script type="text/javascript" src="/assets/js/bootstrap-tooltip.js"></script>
<script type="text/javascript" src="/assets/js/bootstrap-popover.js"></script>
<script type="text/javascript" src="/assets/js/severity_tooltip.js"></script>
<script type="text/javascript" src="/assets/js/forums.js"></script>
<script type="text/javascript" src="/assets/js/edit.js"></script>
